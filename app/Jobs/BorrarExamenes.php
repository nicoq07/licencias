<?php

namespace App\Jobs;

use App\Models\Examen;
use Carbon\Carbon;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BorrarExamenes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $examenes = Examen::where('created_at', '<=', Carbon::today()->subWeek())->get();
            print sizeof($examenes);
            foreach ($examenes  as $examen) {
                $examen->delete();
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}
