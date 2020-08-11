<?php

namespace App\Console\Commands;

use App\Models\Book;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;

class deletebook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears the books 1 year';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $books = Book::all()->where('publish_date','<', Carbon::now()->subYear(1));
        foreach ($books as $book){
            $book->destroy($book->id);
        }
        $this->info('deleted '.count($books). ' books' );
    }
}
