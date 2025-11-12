<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InboxContactModel;
use Carbon\Carbon;

class InboxContactController extends Controller
{
    public function index()
    {
        $inboxContact = InboxContactModel::orderBy('created_at', 'desc')->get();
        return view('Dashboard.inbox_contact', [
            'title' => 'Inbox Contact',
            'inboxContact' => $inboxContact
        ]);
    }

    public function destroy($id)
    {
        $inboxContact = InboxContactModel::findOrFail($id);
        $inboxContact->delete();

        return response()->json(['success' => 'Inbox berhasil dihapus']);
    }

    public function show($id)
    {
        $inboxContact = InboxContactModel::findOrFail($id);
        $formattedDate = Carbon::parse($inboxContact->created_at)->locale('id')->isoFormat('dddd, DD/MM/YYYY - HH:mm');

        return response()->json([
            'id' => $inboxContact->id,
            'nama_lengkap' => $inboxContact->nama_lengkap,
            'nomor_handphone' => $inboxContact->nomor_handphone,
            'email' => $inboxContact->email,
            'deskripsi' => $inboxContact->deskripsi,
            'created_at' => $formattedDate,
        ]);
    }
}
