<?php


namespace DM\SynologyBundle;


use Symfony\Component\Yaml\Yaml;

final class Synology
{
    public static function postPackageInstall()
    {
        var_dump((dirname(__DIR__, 4));
        self::createPackageYaml();
        self::createRoutesYaml();
        self::addToEnv();
    }

    public static function postPackageUninstall()
    {
        self::removeYamls();
        self::remToEnv();
    }

    private static function createPackageYaml()
    {
        $array = [
            'synology' => [
                'dsm_app_url' => '%env(DSM_APP_URL)%',
                'dsm_app_id' => '%env(DSM_APP_ID)%',
                'dsm_app_password' => '%env(DSM_APP_PASSWORD)%'
            ]
        ];

        file_put_contents((dirname(__DIR__, 4) . '/config/packages/synology.yaml'), Yaml::dump($array));
    }

    private static function createRoutesYaml()
    {
        $array = [
            'synology' => [
                'resource' => '@SynologyBundle/Resources/config/routes.xml',
                'prefix' => '/',
            ]
        ];

        file_put_contents((dirname(__DIR__, 4) . '/config/routes/synology.yaml'), Yaml::dump($array));
    }

    private static function addToEnv()
    {
        $file = dirname(__DIR__, 4) . '/.env';
        $start = "\n###> damienmillet/synology-bundle ###\n";
        $env = ['DSM_APP_URL', 'DSM_APP_ID', 'DSM_APP_PASSWORD'];
        $end = "###< damienmillet/synology-bundle ###";
        $regex = "@$start(\w|\d|\/n|\W|\s\S)*?$end@";

        if (is_file($file) && !preg_match($regex, file_get_contents($file))) {

            file_put_contents($file, $start, FILE_APPEND);

            foreach ($env as $key => $item) {
                file_put_contents($file, $item . "=\n", FILE_APPEND);
            }

            file_put_contents($file, $end, FILE_APPEND);
        }
    }

    private static function removeYamls()
    {
        if (is_dir($file = dirname(__DIR__, 4) . '/config/packages/synology.yaml')) {
            unlink($file);
        }
        if (is_dir($file = dirname(__DIR__, 4) . '/config/routes/synology.yaml')) {
            unlink($file);
        }
    }

    private static function remToEnv()
    {
        $file = dirname(__DIR__, 4) . '/.env';

        $start = "\n###> damienmillet/synology-bundle ###";
        $end = "###< damienmillet/synology-bundle ###\n";

        $regex = "@$start(\w|\d|\/n|\W|\s\S)*?$end@";

        $preg = preg_replace($regex, "", file_get_contents($file));
        file_put_contents($file, $preg);
    }
}
