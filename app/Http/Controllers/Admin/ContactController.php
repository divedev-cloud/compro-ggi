<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(15);
        
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Display the specified contact message.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Toggle the follow up status.
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->update([
            'is_followed_up' => !$contact->is_followed_up,
        ]);

        $status = $contact->is_followed_up ? 'sudah di-follow up' : 'belum di-follow up';
        
        return back()->with('success', "Status pesan berhasil diubah menjadi {$status}.");
    }

    /**
     * Remove the specified contact message.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        
        return redirect()->route('admin.contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
