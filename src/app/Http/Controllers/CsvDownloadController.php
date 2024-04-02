<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactController extends Controller
{
    public function downloadCSV(): StreamedResponse
    {
        $fileName = 'contacts.csv';
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() {
            $file = fopen('php://output', 'w');
            // CSVヘッダー
            fputcsv($file, ['ID', 'First Name', 'Last Name', 'Gender', 'Email', 'Tell', 'Address', 'Building', 'Category', 'Detail']);

            // データの取得とCSVへの書き出し
            $contacts = DB::table('contacts')
                ->join('categories', 'contacts.category_id', '=', 'categories.id')
                ->select('contacts.id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'categories.content as category_content', 'detail')
                ->get();

            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->id,
                    $contact->first_name,
                    $contact->last_name,
                    $contact->gender === 1 ? '男性' : ($contact->gender === 2 ? '女性' : 'その他'),
                    $contact->email,
                    $contact->tell,
                    $contact->address,
                    $contact->building,
                    $contact->category_content,
                    $contact->detail,
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}