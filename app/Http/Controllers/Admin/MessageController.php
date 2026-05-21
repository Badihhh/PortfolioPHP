<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        // Tandai sebagai sudah dibaca
        $message->update(['is_read' => true]);

        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus!');
    }

    public function markRead(Message $message)
    {
        $message->update(['is_read' => true]);

        return redirect()->route('admin.messages.index')
            ->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function markUnread(Message $message)
    {
        $message->update(['is_read' => false]);

        return redirect()->route('admin.messages.index')
            ->with('success', 'Pesan ditandai belum dibaca.');
    }
}
