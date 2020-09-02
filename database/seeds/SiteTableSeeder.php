<?php

use Illuminate\Database\Seeder;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Subscriber::truncate();
        \App\Site::truncate();

        $totalSite = 100;
        $minSubscribers = 100;
        $maxSubscribers = 200;
        $minList = 100;
        $maxList = 200;
        $minEmails = 100;
        $maxEmails = 200;
        $minEmailLogs = 100;
        $maxEmailLogs = 200;

        factory(\App\Site::class, $totalSite)->create()->each(function($site) use (
            $totalSite,
            $minSubscribers,
            $maxSubscribers,
            $minList,
            $maxList,
            $minEmails,
            $maxEmails,
            $minEmailLogs,
            $maxEmailLogs
        ) {
            $subscribers = $site->subscribers()
                ->saveMany(factory(App\Subscriber::class,rand($minSubscribers, $maxSubscribers))
                ->make(['site_id' => $site->id]));

            $subscriberIds = $subscribers->pluck('id')->toArray();

            $site->lists()
                ->saveMany(factory(App\Lists::class,rand($minList, $maxList))
                ->make(['site_id' => $site->id]));

            $site->emails()
                ->saveMany(factory(App\Email::class,rand($minEmails, $maxEmails))
                ->make(['site_id' => $site->id]))->each(function($email) use ($subscriberIds, $minEmailLogs, $maxEmailLogs) {
                    $email->logs()
                        ->saveMany(factory(App\EmailLog::class,rand($minEmailLogs, $maxEmailLogs))
                        ->make([
                            'email_id' => $email->id,
                            'subscriber_id' => $subscriberIds[array_rand($subscriberIds)]
                        ]));
                });

        });;

        $this->command->info('Site seeded : ' . $totalSite);
    }
}
