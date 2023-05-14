<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\Document;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use SplFileInfo;

class Post
{

    public string $slug;
    public string $title;

    public string $excerpt;

    public string $date;

    public string $body;

    /**
     * @param string $title
     * @param string $excerpt
     * @param string $date
     * @param string $body
     */
    public function __construct(string $slug, string $title, string $excerpt, string $date, string $body)
    {
        $this->slug = $slug;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path('posts')))
                ->map(fn(SplFileInfo $file) => YamlFrontMatter::parseFile($file))
                ->map(fn(Document $document) => new Post(
                    $document->slug,
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body())
                )
                ->sortByDesc('slug');
        });
    }

    public static function find($slug)
    {
        return self::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        $post = self::find($slug);
        if (!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
