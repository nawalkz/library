<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Emprunt;
use App\Notifications\LivrePretNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Définir la planification des tâches de l'application.
     */
    protected function schedule(Schedule $schedule): void
    {
        // 🔔 Notification de rappel : un jour avant la date de retour prévue
        $schedule->call(function () {
            $emprunts = Emprunt::whereNull('date_retour_reelle')
                ->whereDate('date_reteure', Carbon::tomorrow())
                ->get();

            foreach ($emprunts as $emprunt) {
                $message = "⏳ Rappel : demain est la date limite de retour du livre '" . $emprunt->livre->titre . "'";
                $emprunt->user->notify(new LivrePretNotification($message));
            }
        })->dailyAt('09:00') /* ->everyMinute() */

;

        // ⚠️ Notification de retard : lorsque la date de retour est dépassée
        $schedule->call(function () {
            $emprunts = Emprunt::whereNull('date_retour_reelle')
                ->whereDate('date_reteure', '<', Carbon::today())
                ->get();

            foreach ($emprunts as $emprunt) {
                $message = "⚠️ Vous avez dépassé la date de retour du livre '" . $emprunt->livre->titre . "'. Veuillez le retourner dès que possible.";
                $emprunt->user->notify(new LivrePretNotification($message));
            }
        })->dailyAt('10:00') /* ->everyMinute() */

;
$schedule->call(function () {
        DB::table('notifications')
            ->where('created_at', '<', now()->subDays(7))
            ->delete();
    })->daily();
    }

    /**
     * Enregistrer les commandes de l'application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
