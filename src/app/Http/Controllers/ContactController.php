<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'detail']);
        $tell = $request->input('tell-1') . $request->input('tell-2') . $request->input('tell-3');
        $contact['tell'] = $tell;
        $contact['content'] = $request->input('content');
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'detail']);
        $tell = $request->input('tell-1') . $request->input('tell-2') . $request->input('tell-3');
        $contact['tell'] = $tell;
        $contact['content'] = $request->input('content');
        Contact::create($contact);
        return view('thanks');
    }
}