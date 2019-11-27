<?php

namespace App\Console\Commands;

use App\Services\GithubService;
use Illuminate\Console\Command;

class GitInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'git:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $repoData = [];
        $username = env('GITHUB_USERNAME');
        $gitApi = new GithubService();
        $repoStorage = [];
        $user = $gitApi->getUser($username);
        $repos = $gitApi->getUserRepositories($username);

        foreach ($repos as $key => $repo) {
            if ($repo['fork']) {
                continue;
            }
            $repoStorage[] = $repo;

            $directory = storage_path('app/git');
            $directoryExists = $directory . "/" . $repo['name'];
            $output = null;
            if (file_exists($directoryExists)) {
                exec('rm -rf ' . $directoryExists, $output);
                $this->info("Repo " . $repo['name'] . " apagado!");
            }

            exec('cd ' . $directory . " && git clone " . $repo['clone_url'], $output);

            exec('cd ' . $directory . '/' . $repo['name'] . '&& git ls-files | xargs wc -l', $output);


            $repoData = array_merge($repoData,$this->sanitizeRepoData($output));
            if($key > 2){
                dd($repoData);
            }
        }
    }

    public function sanitizeRepoData(array $data)
    {
        $repoData = [];
        foreach ($data as $line) {

            $infos = explode(' ', $line);
            $file = $infos[count($infos) - 1];
            $lines = $infos[count($infos) - 2];
            $mime = explode('.', $file);
            $mime = end($mime);
            if (!array_key_exists($mime, $repoData)) {

                $repoData[$mime]['lines'] = 0;
                $repoData[$mime]['files'] = [];
            }
            echo $line . "\n";
            echo $file . "\n";
            echo $lines . "\n";
            echo $mime  . "\n";
            $repoData[$mime]['lines'] += $lines;
            //array_push($cleanData[$mime]['files'],$file);
        }

        return $repoData;
    }


}
