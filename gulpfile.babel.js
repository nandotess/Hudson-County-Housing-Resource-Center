
'use strict';

const gulp = require('gulp');
const gulpLoadPlugins = require('gulp-load-plugins');
const browser = require('browser-sync');
const config = require('config-yml');

const $ = gulpLoadPlugins({
    pattern: ['gulp-*', 'gulp.*', '@*/gulp{-,.}*', 'cli-*']
});

// Help
const _default = function(done) {
    console.log('');
    console.log($.cliColor.greenBright('If you are starting a new project, please remember to update the setting paths.site from config.yml'));
    console.log('');
    console.log($.cliColor.blackBright('# Initialization tasks'));
    console.log('gulp ' + $.cliColor.green('install') + '                                             ' + $.cliColor.blackBright('# Install UI resources (run once at the beginning of the development process)'));
    console.log('');
    console.log($.cliColor.blackBright('# Triggered by `gulp install`'));
    console.log('gulp ' + $.cliColor.green('npm-css') + '                                             ' + $.cliColor.blackBright('# Copy CSS from Node modules to the project'));
    console.log('gulp ' + $.cliColor.green('npm-foundation') + '                                      ' + $.cliColor.blackBright('# Copy Foundation setting file from Node module to the project'));
    console.log('');
    console.log($.cliColor.blackBright('# Development tasks'));
    console.log('gulp ' + $.cliColor.green('init') + '                                                ' + $.cliColor.blackBright('# Shortcode for `gulp watch`'));
    console.log('gulp ' + $.cliColor.green('watch') + '                                               ' + $.cliColor.blackBright('# Watch for changes on files to recompile them'));

    console.log('gulp ' + $.cliColor.green('build') + '                                               ' + $.cliColor.blackBright('# Build JavaScript and Sass files'));
    console.log('');
    console.log($.cliColor.blackBright('# Triggered by `gulp install`, `gulp watch`, `gulp local` and `gulp serve`:'));
    console.log('gulp ' + $.cliColor.green('sass') + '                                                ' + $.cliColor.blackBright('# Combine/compile and compress Sass files'));
    console.log('gulp ' + $.cliColor.green('sass-print') + '                                          ' + $.cliColor.blackBright('# Combine/compile and compress Sass print files'));
    console.log('gulp ' + $.cliColor.green('sass-editor') + '                                         ' + $.cliColor.blackBright('# Combine/compile and compress Sass editor files'));
    console.log('gulp ' + $.cliColor.green('js') + '                                                  ' + $.cliColor.blackBright('# Combine and compress JavaScript files'));
    console.log('');

    done();
};

gulp.task('default', _default);

/**
 * Development tasks
 */

// Shortcode for gulp watch
gulp.task('init', function() {
    gulp.start('watch');
});

// Combine/compile and compress Sass files
const _sass = function() {
    return gulp.src(config.paths.src_sass)
        .pipe($.sourcemaps.init())
        .pipe(
            $.sass({
                includePaths: config.paths.npm_sass,
                outputStyle: 'compact'
            })
            .on('error', $.sass.logError))
        .pipe($.autoprefixer())
        .pipe($.sourcemaps.write('.'))
        .pipe(gulp.dest(config.paths.dist_css))
        .pipe($.size())
        .pipe(browser.stream({ match: '**/*.css' }));
};

gulp.task('sass', _sass);

// Combine/compile and compress Sass print files
const _sassPrint = function() {
    return gulp.src(config.paths.src_sass_print)
        .pipe($.sourcemaps.init())
        .pipe(
            $.sass({
                includePaths: config.paths.npm_sass,
                outputStyle: 'compact'
            })
            .on('error', $.sass.logError))
        .pipe($.autoprefixer())
        .pipe($.sourcemaps.write('.'))
        .pipe(gulp.dest(config.paths.dist_css))
        .pipe($.size())
        .pipe(browser.stream({ match: '**/*.css' }));
};

gulp.task('sass-print', _sassPrint);

// Combine/compile and compress Sass editor files
const _sassEditor = function() {
    return gulp.src(config.paths.src_sass_editor)
        .pipe($.sourcemaps.init())
        .pipe(
            $.sass({
                includePaths: config.paths.npm_sass,
                outputStyle: 'compact'
            })
            .on('error', $.sass.logError))
        .pipe($.autoprefixer())
        .pipe($.sourcemaps.write('.'))
        .pipe(gulp.dest(config.paths.dist_css))
        .pipe($.size())
        .pipe(browser.stream({ match: '**/*.css' }));
};

gulp.task('sass-editor', _sassEditor);

// Combine and compress JavaScript files
const _js = function() {
    const npm_js_files = config.paths.npm_js;
    const app_js_files = config.helpers.all_js;
    const js_files = [...npm_js_files, ...app_js_files];

    return gulp.src(js_files)
        .pipe($.sourcemaps.init())
        .pipe($.babel())
        .pipe($.concat(config.paths.dist_js.file))
        .pipe($.uglify())
        .pipe($.sourcemaps.write('.'))
        .pipe(gulp.dest(config.paths.dist_js.folder))
        .pipe($.size());
};

gulp.task('js', _js);

// Build JavaScript and Sass files
const _build = gulp.series(_sass, _sassPrint, _sassEditor, _js, function(done) {
    done();
});

gulp.task('build', _build);

// Watch for changes on files to recompile them
const _watch = gulp.series(_sass, _sassPrint, _sassEditor, _js, function(done) {
    gulp.watch(config.helpers.all_sass, _sass);
    gulp.watch(config.helpers.all_sass, _sassEditor);
    gulp.watch(config.helpers.all_sass_print, _sassPrint);

    config.helpers.all_js.forEach((js_regexp) => gulp.watch(js_regexp, _js));

    gulp.watch('**/*.html').on('change', browser.reload);

    done();
});

gulp.task('watch', _watch);

// Shortcode for gulp watch
const _init = gulp.series(_watch, function(done) {
    done();
});

gulp.task('init', _init);

/**
 * Initialization tasks
 */

// Copy CSS from Node modules to the project
const _npmCss = function() {
    return gulp.src(config.paths.npm_css)
        .pipe(gulp.dest(config.paths.dist_css));
};

gulp.task('npm-css', _npmCss);

// Copy Foundation setting file from Node module to the project
const _npmFoundation = function() {
    return gulp.src(config.foundation.settings.src)
        .pipe($.concat(config.foundation.settings.dist.file))
        .pipe(gulp.dest(config.foundation.settings.dist.folder));
};

gulp.task('npm-foundation', _npmFoundation);

// Install UI resources (run once at the beginning of the development process, otherwise, you can override custom changes)
const _install = gulp.series(_npmCss, _npmFoundation, _sass, _sassEditor, _sassPrint, _js, function(done) {
    done();
});

gulp.task('install', _install);
