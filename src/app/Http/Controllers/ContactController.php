<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view('index', compact('contacts','categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = [
            'category_id' => $request->input('category_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'tell' => $request->input('tell-1') . $request->input('tell-2') . $request->input('tell-3'),
            'address' => $request->input('address'),
            'building' => $request->input('building'),
            'content' => $request->input('content'),
            'detail' => $request->input('detail'),
        ];

        $request->session()->put('inputData', $contact);

        $categoryContent = Category::where('id', $contact['category_id'])->first()->content;
        $contact['categoryContent'] = $categoryContent;
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $inputData = $request->session()->get('inputData');
        Contact::create($inputData);
        return view('thanks');
    }

    public function admin()
    {
        $contacts = Contact::with('category')->Paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }
    public function  search(Request $request)
    {
        $item = Contact::where('first_name', 'last_name', 'email', 'Like',"%{$request->input}%")->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }
}