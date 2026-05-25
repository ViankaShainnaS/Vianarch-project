<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Tasklist;

class OrderController extends Controller
{
    public function placeOrder()
    {
        // Logic untuk menampilkan halaman pemesanan
        return view('user.order');
    }

    // public function orderForm(){
    //     // $codes = DB::table('country_codes')->get();
    //     return view('user.order');

    // }

    public function showFinished()
        {
            $user = Auth::user();
            $orders = Auth::user()
            ->orders()
            ->where('status', 'finished')
            ->get();

            return view('user.finished', compact('user', 'orders'));
        }

    public function showProgress()
        {
            $user = Auth::user();
            $orders = Auth::user()
            ->orders()
            ->where('status','progress')
            ->get();

            return view('user.progress', compact('user', 'orders'));
        }

        public function addTasklist(Request $request, $id)
        {
            $countTasklists = Tasklist::where('order_id', $id)->count();
            if($request->task_name == null){
                return redirect()->route('admin.details.progress', $id)->with('error', 'Tasklist name cannot be empty!');
            }
            if ($countTasklists >= 8) {
                return redirect()->route('admin.details.progress', $id)->with('error', 'Maksimal 8 tasklist per order! Kamu bisa hapus beberapa tasklist yang sudah ada untuk menambahkan tasklist baru.');
            }
            Tasklist::create([
                'order_id' => $id,
                'task_name' => $request->task_name
            ]);

            return redirect()->route('admin.details.progress', $id);
        }

        public function showTasklistsProgressed($id){
            $tasklists = Tasklist::where('order_id', $id)->get();
            
            return view('admin.details-progress', compact('tasklists'));
        }

        public function updateTasklists($id){
            $tasklist = Tasklist::findOrFail($id);
            $tasklist->is_done = !$tasklist->is_done;
            $tasklist->save();

            return back();
        }

        public function deleteTasklist($id){
            $tasklist = Tasklist::findOrFail($id);
            $tasklist->delete();

            return redirect()->route('admin.details.progress', $tasklist->order_id)
            ->with('success', 'Task deleted successfully!');
        }
    
    public function submitOrder(Request $request)
    {
        $validation = $request->validate([
        'username' => 'required|string',
        'phone_number' => 'required|string',
        'category' => 'required|string',
        'visual' => 'required|string',
        'email' => 'required|email',
        'area' => 'required|string',
        'typeOfBuilding' => 'required|string',
    ]);
        $status = $request->input('status', 'draft');
        // kalo error iser id nya dibikin variabel
        Order::create(array_merge($validation, ['status' => $status], ['user_id' => Auth::id()]));
        return redirect()->route('user.order')->with('success', 'Order drafted successfully!');

        if('username' || 'phone_number' || 'category' || 'visual' || 'email' || 'area' || 'typeOfBuilding' == null){
            return redirect()->back()->with('error', 'Please fill all the fields.');
        }
    }

    public function showDrafts()
        {
            $user = Auth::user();
            $orders = Auth::user()->orders()->where('status', 'draft')->get();

            return view('user.drafts', compact('user', 'orders'));
        }
    public function editDraft($id)
        {
            $user = Auth::user();
            $draft = Order::findOrFail($id);
            return view('user.edit-draft', compact('user', 'draft'));
        }
    public function updateDraft(Request $request, $id)
        {
            $validation = $request->validate([
                'username' => 'required|string',
                'phone_number' => 'required|string',
                'category' => 'required|string',
                'visual' => 'required|string',
                'email' => 'required|email',
                'area' => 'required|string',
                'typeOfBuilding' => 'required|string',
            ]);
            
            
            $draft = Order::findOrFail($id);
            $draft->update($validation);

            return redirect()->route('user.drafts.edit', $draft->id)->with('success', 'Draft updated successfully!');
        }
    
    public function deleteDraft($id)
        {
            $draft = Order::findOrFail($id);
            $draft->delete();

            return redirect()->route('user.drafts')->with('success', 'Draft deleted successfully!');
        }

        public function submitDraft(Request $request){
            $order = Order::findOrFail($request->id);
            $order->status = 'progress';
            $order->save();
            return redirect()->route('user.drafts')->with('success', 'Draft submitted successfully!');
        }

}
