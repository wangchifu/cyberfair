<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'Asia/Taipei',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'zh-TW',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'zh-TW',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\FortifyServiceProvider::class,
        App\Providers\JetstreamServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Arr' => Illuminate\Support\Arr::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'Date' => Illuminate\Support\Facades\Date::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Http' => Illuminate\Support\Facades\Http::class,
        'Js' => Illuminate\Support\Js::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'RateLimiter' => Illuminate\Support\Facades\RateLimiter::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        // 'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Str' => Illuminate\Support\Str::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

    ],
    'schools' => [    
        '079999'=>'教育處',
        '079998'=>'縣網中心',    
        '074308' => '彰化藝術高中',
        '074505' => '陽明國中',
        '074506' => '彰安國中',
        '074507' => '彰德國中',
        '074538' => '彰興國中',
        '074539' => '成功高中(國中部)',
        '074540' => '彰泰國中',
        '074541' => '信義國中小(國中部)',
        '074509' => '芬園國中',
        '074526' => '花壇國中',
        '074518' => '溪湖國中',
        '074339' => '成功高中(高中部)',
        '074519' => '埔鹽國中',
        '074520' => '埔心國中',
        '074512' => '萬興國中',
        '074517' => '芳苑國中',
        '074515' => '大城國中',
        '074514' => '竹塘國中',
        '074313' => '二林高中',
        '074516' => '草湖國中',
        '074537' => '原斗國中小(國中部)',
        '074525' => '大村國中',
        '074510' => '員林國中',
        '074511' => '明倫國中',
        '074527' => '永靖國中',
        '074536' => '大同國中',
        '074323' => '和美高中(高中部)',
        '074535' => '和群國中',
        '074521' => '福興國中',
        '074524' => '伸港國中',
        '074504' => '線西國中',
        '074503' => '鹿鳴國中',
        '074502' => '鹿港國中',
        '074542' => '鹿江國際中小學(國中部)',
        '074543' => '民權華德福實驗國中小(國中部)',
        '074522' => '秀水國中',
        '074523' => '和美高中(國中部)',
        '074534' => '埤頭國中',
        '074501' => '北斗國中',
        '074532' => '溪州國中',
        '074530' => '社頭國中',
        '074528' => '田中高中(國中部)',
        '074529' => '二水國中',
        '074531' => '田尾國中',
        '074328' => '田中高中(高中部)',
        '074533' => '溪陽國中',
        '071311' => '私立精誠高中(國中部)',
        '071317' => '私立文興高中(國中部)',
        '071318' => '私立正德高中(國中部)',
        '074601' => '中山國小',
        '074602' => '民生國小',
        '074603' => '平和國小',
        '074604' => '南郭國小',
        '074605' => '南興國小',
        '074606' => '東芳國小',
        '074607' => '泰和國小',
        '074608' => '三民國小',
        '074609' => '聯興國小',
        '074610' => '大竹國小',
        '074611' => '國聖國小',
        '074612' => '快官國小',
        '074613' => '石牌國小',
        '074614' => '忠孝國小',
        '074615' => '芬園國小',
        '074616' => '富山國小',
        '074617' => '寶山國小',
        '074618' => '同安國小',
        '074619' => '文德國小',
        '074620' => '茄荖國小',
        '074621' => '花壇國小',
        '074622' => '文祥國小',
        '074623' => '華南國小',
        '074624' => '僑愛國小',
        '074625' => '三春國小',
        '074626' => '白沙國小',
        '074627' => '和美國小',
        '074628' => '和東國小',
        '074629' => '大嘉國小',
        '074630' => '大榮國小',
        '074631' => '新庄國小',
        '074632' => '培英國小',
        '074633' => '線西國小',
        '074634' => '曉陽國小',
        '074635' => '新港國小',
        '074636' => '伸東國小',
        '074637' => '伸仁國小',
        '074638' => '大同國小',
        '074639' => '鹿港國小',
        '074640' => '文開國小',
        '074641' => '洛津國小',
        '074642' => '海埔國小',
        '074643' => '新興國小',
        '074644' => '草港國小',
        '074645' => '頂番國小',
        '074646' => '東興國小',
        '074647' => '管嶼國小',
        '074648' => '文昌國小',
        '074649' => '西勢國小',
        '074650' => '大興國小',
        '074651' => '永豐國小',
        '074652' => '日新國小',
        '074653' => '育新國小',
        '074654' => '秀水國小',
        '074655' => '馬興國小',
        '074656' => '華龍國小',
        '074657' => '明正國小',
        '074658' => '陝西國小',
        '074659' => '育民國小',
        '074660' => '溪湖國小',
        '074661' => '東溪國小',
        '074662' => '湖西國小',
        '074663' => '湖東國小',
        '074664' => '湖南國小',
        '074665' => '媽厝國小',
        '074666' => '埔鹽國小',
        '074667' => '大園國小',
        '074668' => '南港國小',
        '074669' => '好修國小',
        '074670' => '永樂國小',
        '074671' => '新水國小',
        '074672' => '天盛國小',
        '074673' => '埔心國小',
        '074674' => '太平國小',
        '074675' => '舊館國小',
        '074676' => '羅厝國小',
        '074677' => '鳳霞國小',
        '074678' => '梧鳳國小',
        '074679' => '明聖國小',
        '074680' => '員林國小',
        '074681' => '育英國小',
        '074682' => '靜修國小',
        '074683' => '僑信國小',
        '074684' => '員東國小',
        '074685' => '饒明國小',
        '074686' => '東山國小',
        '074687' => '青山國小',
        '074688' => '明湖國小',
        '074689' => '大村國小',
        '074690' => '大西國小',
        '074691' => '村上國小',
        '074692' => '村東國小',
        '074693' => '永靖國小',
        '074694' => '福德國小',
        '074695' => '永興國小',
        '074696' => '福興國小',
        '074697' => '德興國小',
        '074698' => '田中國小',
        '074699' => '三潭國小',
        '074700' => '大安國小',
        '074701' => '內安國小',
        '074702' => '東和國小',
        '074703' => '明禮國小',
        '074704' => '社頭國小',
        '074705' => '橋頭國小',
        '074706' => '朝興國小',
        '074707' => '清水國小',
        '074708' => '湳雅國小',
        '074709' => '二水國小',
        '074710' => '復興國小',
        '074711' => '源泉國小',
        '074712' => '北斗國小',
        '074713' => '萬來國小',
        '074714' => '螺青國小',
        '074715' => '大新國小',
        '074716' => '螺陽國小',
        '074717' => '田尾國小',
        '074718' => '南鎮國小',
        '074719' => '陸豐國小',
        '074720' => '仁豐國小',
        '074721' => '埤頭國小',
        '074722' => '合興國小',
        '074723' => '豐崙國小',
        '074724' => '芙朝國小',
        '074725' => '中和國小',
        '074726' => '大湖國小',
        '074727' => '溪州國小',
        '074728' => '僑義國小',
        '074729' => '三條國小',
        '074730' => '水尾國小',
        '074731' => '潮洋國小',
        '074732' => '成功國小',
        '074733' => '圳寮國小',
        '074734' => '大莊國小',
        '074735' => '南州國小',
        '074736' => '二林國小',
        '074737' => '興華國小',
        '074738' => '中正國小',
        '074739' => '育德國小',
        '074740' => '香田國小',
        '074741' => '廣興國小',
        '074742' => '萬興國小',
        '074743' => '新生國小',
        '074744' => '中興國小',
        '074745' => '原斗國中小(國小部)',
        '074746' => '萬合國小',
        '074747' => '大城國小',
        '074748' => '永光國小',
        '074749' => '西港國小',
        '074750' => '美豐國小',
        '074751' => '頂庄國小',
        '074752' => '潭墘國小',
        '074753' => '竹塘國小',
        '074754' => '田頭國小',
        '074755' => '民靖國小',
        '074756' => '長安國小',
        '074757' => '土庫國小',
        '074758' => '芳苑國小',
        '074759' => '後寮國小',
        '074760' => '民權華德福實驗國中小(國小部)',
        '074761' => '育華國小',
        '074762' => '草湖國小',
        '074763' => '建新國小',
        '074764' => '漢寶國小',
        '074765' => '王功國小',
        '074766' => '新寶國小',
        '074767' => '路上國小',
        '074769' => '和仁國小',
        '074771' => '鹿東國小',
        '074772' => '舊社國小',
        '074773' => '崙雅國小',
        '074774' => '信義國中小(國小部)',
        '074775' => '大成國小',
        '074776' => '新民國小',
        '074777' => '湖北國小',
        '074778' => '鹿江國際中小學(國小部)',
    ],
    'eng_schools' =>[
        '074608'=>'smes',
        '074775'=>'dches',
        '074610'=>'tces',
        '074601'=>'cses',
        '074603'=>'phes',
        '074602'=>'mses',
        '074613'=>'spes',
        '074612'=>'kges',
        '074614'=>'jsps',
        '074606'=>'tfps',
        '074604'=>'nges',
        '074605'=>'nses',
        '074607'=>'thps',
        '074611'=>'gses',
        '074609'=>'lsps',
        '074619'=>'wdes',
        '074618'=>'taes',
        '074615'=>'fyps',
        '074620'=>'cles',
        '074616'=>'fsps',
        '074617'=>'bses',
        '074625'=>'sstps',
        '074622'=>'wses',
        '074626'=>'bsps',
        '074621'=>'htes',
        '074623'=>'hnes',
        '074624'=>'caps',
        '074654'=>'hses',
        '074659'=>'ymes',
        '074657'=>'mcps',
        '074658'=>'ssps',
        '074655'=>'smses',
        '074656'=>'hlps',
        '074640'=>'wkes',
        '074646'=>'sdses',
        '074641'=>'ljes',
        '074642'=>'hpes',
        '074644'=>'tges',
        '074645'=>'dfes',
        '074771'=>'ldes',
        '074639'=>'lges',
        '074643'=>'bsses',
        '074650'=>'bdsps',
        '074648'=>'wces',
        '074652'=>'rses',
        '074651'=>'yfes',
        '074649'=>'ssses',
        '074653'=>'yses',
        '074647'=>'gyes',
        '074633'=>'sces',
        '074634'=>'syes',
        '074629'=>'dces',
        '074630'=>'dres',
        '074769'=>'hres',
        '074628'=>'hdes',
        '074627'=>'hmps',
        '074632'=>'pyps',
        '074631'=>'ssjes',
        '074638'=>'dtes',
        '074637'=>'sres',
        '074636'=>'sdes',
        '074635'=>'sgps',
        '074681'=>'yyes',
        '074688'=>'mhes',
        '074686'=>'dsps',
        '074687'=>'chcses',
        '074684'=>'ytes',
        '074680'=>'ylps',
        '074683'=>'csps',
        '074682'=>'sjses',
        '074685'=>'rmes',
        '074704'=>'stps',
        '074773'=>'lyps',
        '074707'=>'bcses',
        '074706'=>'scsps',
        '074708'=>'nyes',
        '074705'=>'ctps',
        '074772'=>'csnes',
        '074693'=>'yces',
        '074695'=>'ysps',
        '074694'=>'fdps',
        '074696'=>'sfses',
        '074697'=>'sdsps',
        '074674'=>'tpes',
        '074679'=>'msps',
        '074673'=>'pses',
        '074678'=>'wfes',
        '074677'=>'sfsps',
        '074675'=>'jges',
        '074676'=>'rtes',
        '074661'=>'bdses',
        '074777'=>'hbps',
        '074662'=>'fses',
        '074663'=>'fdes',
        '074664'=>'hnps',
        '074665'=>'mtes',
        '074660'=>'shps',
        '074690'=>'dses',
        '074689'=>'dtps',
        '074691'=>'tsps',
        '074692'=>'tdes',
        '074667'=>'dyes',
        '074672'=>'tses',
        '074670'=>'yles',
        '074669'=>'hsps',
        '074668'=>'ngps',
        '074666'=>'pyes',
        '074671'=>'sses',
        '074699'=>'stes',
        '074700'=>'daes',
        '074701'=>'naes',
        '074698'=>'tjes',
        '074703'=>'mles',
        '074702'=>'dhps',
        '074776'=>'smps',
        '074715'=>'dsses',
        '074712'=>'bdes',
        '074713'=>'wles',
        '074714'=>'rces',
        '074716'=>'ryes',
        '074720'=>'rfes',
        '074717'=>'twps',
        '074718'=>'njes',
        '074719'=>'lfes',
        '074726'=>'dhes',
        '074725'=>'ches',
        '074722'=>'shses',
        '074724'=>'fces',
        '074721'=>'ptes',
        '074723'=>'fles',
        '074729'=>'steps',
        '074734'=>'djps',
        '074730'=>'swes',
        '074733'=>'jles',
        '074732'=>'cges',
        '074735'=>'njps',
        '074727'=>'sjps',
        '074728'=>'cyes',
        '074731'=>'cyps',
        '074757'=>'tkes',
        '074755'=>'mjes',
        '074754'=>'ttes',
        '074753'=>'ctes',
        '074756'=>'caes',
        '074736'=>'elps',
        '074738'=>'ccps',
        '074744'=>'scses',
        '074739'=>'ydes',
        '074740'=>'sstes',
        '074745'=>'ydps',
        '074743'=>'sssps',
        '074746'=>'whes',
        '074742'=>'wsps',
        '074741'=>'gsps',
        '074737'=>'shes',
        '074747'=>'dcps',
        '074748'=>'yges',
        '074749'=>'sges',
        '074750'=>'mfes',
        '074751'=>'djes',
        '074752'=>'tcps',
        '074765'=>'wges',
        '074760'=>'mces',
        '074760'=>'mcws',
        '074761'=>'yhes',
        '074758'=>'fyes',
        '074763'=>'jses',
        '074759'=>'hles',
        '074762'=>'thes',
        '074766'=>'sbes',
        '074767'=>'lses',
        '074764'=>'hbes',
        '074709'=>'eses',
        '074710'=>'fsses',
        '074711'=>'ycps',
        '074732'=>'spps',
        '074541'=>'hyjhes',
        '074505'=>'ymsc',
        '074506'=>'cajh',
        '074540'=>'ctsjh',
        '074507'=>'ctjh',
        '074538'=>'csjh',
        '074509'=>'fyjh',
        '074526'=>'htjh',
        '074522'=>'hsjh',
        '074503'=>'lmjh',
        '074502'=>'lkjh',
        '074542'=>'ljis',
        '074521'=>'fsjh',
        '074504'=>'hhjh',
        '074323'=>'hmjh',
        '074535'=>'hcjh',
        '074524'=>'skjh',
        '074536'=>'ttjhs',
        '074511'=>'mljh',
        '074510'=>'yljh',
        '074530'=>'stjh',
        '074527'=>'ycjh',
        '074520'=>'psjh',
        '074339'=>'ckjh',
        '074339'=>'cksh',
        '074518'=>'cfjh',
        '074525'=>'ttjh',
        '074519'=>'pyjh',
        '074328'=>'tcjh',
        '074501'=>'ptjhs',
        '074531'=>'twjh',
        '074534'=>'ptjh',
        '074532'=>'ccjh',
        '074533'=>'hyjh',
        '074514'=>'ctjhs',
        '074537'=>'ydjh',
        '074512'=>'whjh',
        '074515'=>'tcjhs',
        '074517'=>'fyjhs',
        '074516'=>'thjh',
        '074529'=>'esjh',
        '074313'=>'elsh',
    ],

];
