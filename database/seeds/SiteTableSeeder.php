<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->dropAllCollections();

        $totalSite = 1000;
        $minSubscribers = 50;
        $maxSubscribers = 10000;
        $minList = 2;
        $maxList = 10;
        $minEmails = 50;
        $maxEmails = 200;
        $minEmailLogs = 50;
        $maxEmailLogs = 150;

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
//            Use createSiteTables if using mysql
//            $this->createSiteTables($site->id);

            $subscribers = $site->subscribers($site->id)
                ->saveMany(factory(\App\Subscriber::class,rand($minSubscribers, $maxSubscribers))
                ->make(['site_id' => $site->id, 'collection' => $site->id]));

            $subscriberIds = $subscribers->pluck('id')->toArray();

            $site->lists()
                ->saveMany(factory(App\Lists::class,rand($minList, $maxList))
                ->make(['site_id' => $site->id, 'collection' => $site->id]));

            $site->emails()
                ->saveMany(factory(App\Email::class,rand($minEmails, $maxEmails))
                ->make(['site_id' => $site->id]))->each(function($email) use (
                    $subscriberIds,
                    $minEmailLogs,
                    $maxEmailLogs,
                    $site
                ) {
                    $email->logs()
                        ->saveMany(factory(App\EmailLog::class,rand($minEmailLogs, $maxEmailLogs))
                        ->make([
                            'collection'    => $site->id,
                            'site_id'       => $site->id,
                            'email_id'      => $email->id,
                            'subscriber_id' => $subscriberIds[array_rand($subscriberIds)]
                        ]));
                });

        });;

        $this->command->info('Site seeded : ' . $totalSite);
    }

    private function createSiteTables($siteId)
    {
        Schema::create('subscribers_site_' . $siteId, function ($table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->text('address');
            $table->timestamps();
        });

        Schema::create('email_logs_site_' . $siteId, function ($table) {
            $table->id();
            $table->unsignedBigInteger('email_id');
            $table->uuid('subscriber_id');
            $table->text('log')->nullable();
            $table->timestamps();
        });

        Schema::create('emails_site_' . $siteId, function ($table) {
            $table->id();
            $table->unsignedBigInteger('site_id');
            $table->text('subject');
            $table->string('from');
            $table->string('to');
            $table->longText('template');
            $table->timestamps();
        });
    }

    public function dropAllCollections()
    {
        foreach (\DB::connection('mongodb')->getMongoDB()->listCollections() as $collection) {
            Schema::connection('mongodb')->drop($collection->getName());
        }


        // OLD APPROACH

//        $sites = \App\Site::all();
//        foreach ($sites as $site) {
//            $subscriber = new \App\Subscriber(['collection' => $site->id]);
//            $subscriber->truncate();
//
//            $emailLogs = new \App\EmailLog(['collection' => $site->id]);
//            $emailLogs->truncate();
//
//            $lists = new \App\Lists(['collection' => $site->id]);
//            $lists->truncate();
//
//            $listSubscribers = new \App\ListSubscriber(['collection' => $site->id]);
//            $listSubscribers->truncate();
//        }


        \App\Subscriber::truncate();
        \App\Site::truncate();
        \App\Email::truncate();
        \App\EmailLog::truncate();
        \App\Lists::truncate();
        \App\ListSubscriber::truncate();
    }
}
