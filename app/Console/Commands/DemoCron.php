<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use File, Image;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'deletes the junk files from temp upload';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private $uploadTempPath, $uploadTempThumbPath;
    public function __construct()
    {
        parent::__construct();
        $this->uploadTempPath = public_path("/uploads/temp/");
        $this->uploadTempThumbPath = public_path("/uploads/temp/thumb/");
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");
        $images = File::allFiles($this->uploadTempPath);
        $thumb_images = File::allFiles($this->uploadTempThumbPath);

        if (!empty($images)) {
            foreach ($images as $key => $image) {
                $file_to_delete = $this->uploadTempPath.$image->getRelativePathname();
                File::delete($file_to_delete);
                \Log::info("Image deleted ".$image->getRelativePathname());
            }
        }

        if (!empty($thumb_images)) {
            foreach ($thumb_images as $key => $thumb_image) {
                $thumb_file_to_delete = $this->uploadTempThumbPath.$thumb_image->getRelativePathname();
                File::delete($thumb_file_to_delete);
                \Log::info("Thumb Image deleted ".$thumb_image->getRelativePathname());
            }
        }

    }
}
