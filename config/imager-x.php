<?php

   use craft\helpers\App;

   return [
      '*' => [
         'imagerUrl' => App::env('PRIMARY_SITE_URL') . '/transforms',
         'imagerSystemPath' => App::env('CRAFT_WEB_ROOT') . '/transforms',
         // 'fallbackImage' => App::env('CRAFT_WEB_ROOT') . '/dist/images/fallback.png',
         // 'fallbackImage' => '/dist/images/fallback.png',
         'transformer' => 'servd',
         'storages' => ['servd'],
         'storageConfig' => [
            'servd' => [
                  'folder' => 'transforms',
            ]
         ],
         'cacheEnabled' => true,
         'cacheDuration' => 31536000, // 1 year
         'cacheDurationRemoteFiles' => 31536000, // 1 year
         'preserveColorProfiles' => true,
         'jpegQuality' => 90,
         'pngCompressionLevel' => 0,
         'resizeFilter' => 'lanczos',
         'hashPath' => true,
         'useCwebp' => false,
         'cwebpPath' => '/usr/bin/cwebp',
         'cwebpOptions' => '-q 90',
         'optimizeType' => 'job',
         'optimizers' => null,
         'optimizerConfig' => [
            'jpegoptim' => [
               'extensions' => ['jpg'],
               'path' => '/usr/bin/jpegoptim',
               'optionString' => '--strip-all -m90 -o -p'
            ],
            'jpegtran' => [
               'extensions' => ['jpg'],
               'path' => '/usr/bin/jpegtran',
               'optionString' => '-optimize -copy none'
            ],
            'mozjpeg' => [
               'extensions' => ['jpg'],
               'path' => '/usr/bin/mozjpeg',
               'optionString' => '-optimize -copy none'
            ],
            'optipng' => [
               'extensions' => ['png'],
               'path' => '/usr/bin/optipng',
               'optionString' => '-preserve -strip all'
            ],
            'pngquant' => [
               'extensions' => ['png'],
               'path' => '/usr/bin/pngquant',
               'optionString' => '--strip --skip-if-larger --quality=85-90 --speed 1'
            ],
            'gifsicle' => [
               'extensions' => ['gif'],
               'path' => '/usr/bin/gifsicle',
               'optionString' => '--optimize=3 --colors 256'
            ]
         ],
         // Add this line to prevent errors for missing images
        'errorOnMissingImage' => false,
      ],
      'dev' => [],
      'staging' => [],
      'production' => [
        'optimizers' => ['jpegoptim', 'jpegtran', 'optipng', 'gifsicle'],
      ]
   ];