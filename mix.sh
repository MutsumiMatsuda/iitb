#!bin/bash

# laravel-mix インストール
npm install --save-dev laravel-mix

# webpack.mix.js作成
cat << EOL > ./webpack.mix.js
const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    //
  ]);
EOL

# package.json 変更
PKG_JSON=./package.json
sudo sed -i 's/^"dev": "vite"$/"dev": "npm run development"/g' ${PKG_JSON}
sudo sed -i 's/^"build": "vite build,"$/"development": "mix",\n"watch": "mix watch",\n"watch-poll": "mix watch -- --watch-options-poll=1000",\n"hot": "mix watch --hot",\n"prod": "npm run production",\n"production": "mix --production"/g' ${PKG_JSON}

# type key 削除
npm pkg delete type

# .env 変更
ENV_FILE=./.env
sudo sed -i 's/^VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"$/MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"/g' ${ENV_FILE}
sudo sed -i 's/^VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"$/MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"/g' ${ENV_FILE}

# Vite 削除
npm remove vite laravel-vite-plugin
rm vite.config.js
