<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\NewsModel;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

 
class NewsContentController extends Controller
{
    public function index(Request $request)
    {
        event(new UserActivity()); 
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort', 'desc'); 
    
        $news = NewsModel::orderBy('news_date', $sort)
            ->paginate($perPage)
            ->through(function ($item) {
                $item->formatted_date = Carbon::parse($item->news_date)
                    ->locale('id')
                    ->isoFormat('D MMMM YYYY');
                return $item;
            });
    
        return view('Dashboard.news_content', compact('news'))
            ->with('title', 'News Content')
            ->with('perPage', $perPage)
            ->with('sort', $sort);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_title' => 'required|max:355',
            'id_description' => 'required',
            'en_title' => 'required|max:355',
            'en_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'author' => 'nullable|max:155',
            'news_date' => 'nullable|date',
        ]);

        $newsDate = $request->input('news_date', date('Y-m-d'));
        $imagePath = $request->file('image')->store('newsImg', 'public');

        NewsModel::create([
            'id_title' => $request->input('id_title'),
            'id_description' => $request->input('id_description'),
            'en_title' => $request->input('en_title'),
            'en_description' => $request->input('en_description'),
            'image' => $imagePath,
            'author' => $request->input('author', 'admin'),
            'news_date' => $newsDate,
        ]);

        return response()->json(['success' => 'News created successfully']);
    }

    public function update(Request $request, $slug)
    {
        $news = NewsModel::where('slug', $slug)->firstOrFail();

        $request->validate([
            'id_title' => 'required|max:355',
            'id_description' => 'required',
            'en_title' => 'required|max:355',
            'en_description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'author' => 'nullable|max:155',
            'news_date' => 'nullable|date',
        ]);

        $newsDate = $request->input('news_date', $news->news_date ?? date('Y-m-d'));

        $data = $request->only(['id_title', 'id_description', 'en_title', 'en_description', 'author']);
        $data['news_date'] = $newsDate;

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('newsImg', 'public');
        }

        $news->update($data);

        return response()->json(['success' => 'News updated successfully']);
    }

    public function destroy($slug)
    {
        $news = NewsModel::where('slug', $slug)->firstOrFail();

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return response()->json(['success' => 'News deleted successfully']);
    }

    public function show($slug)
    {
        $news = NewsModel::where('slug', $slug)->firstOrFail();
        return response()->json($news);
    }
}
