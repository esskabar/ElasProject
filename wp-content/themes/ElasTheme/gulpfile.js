/* File: gulpfile.js */
var gulp           = require('gulp'),
    autoprefixer   = require('gulp-autoprefixer'),
    minifycss      = require('gulp-uglifycss'),
    uglify         = require('gulp-uglify'),
    rename         = require('gulp-rename'),
    sass           = require('gulp-sass'),
    plumber        = require('gulp-plumber'),
    notify         = require('gulp-notify'),
    streamqueue    = require('streamqueue'),
    importCss      = require('gulp-import-css'),
    sourcemaps     = require('gulp-sourcemaps'),
    gulpif         = require('gulp-if'),
    concat         = require('gulp-concat'),


    productionMode = false;


gulp.task('default', ['watch']);


gulp.task('styles', function () {

    gulp.task('styles', function () {
        return gulp.src('./src/css/style.scss')
            .pipe(plumber({
                errorHandler: notify.onError("Error: <%= error.message %>")
            }))
            .pipe(sourcemaps.init())
            .pipe(sass())
            .pipe(autoprefixer({
                browsers: ['last 5 versions'],
                cascade: false
            }))
            .pipe(importCss())
            .pipe(rename({suffix: '.min'}))
            .pipe(gulpif(productionMode, minifycss()))
            .pipe(gulp.dest('./build/css'))
            .pipe(notify("Styles task complete"));
    });

});

gulp.task('vendorsJs', function() {
    return streamqueue({ objectMode: true },
        gulp.src('./src/js/vendor/jquery.viewportchecker.js'),
        gulp.src('./src/js/vendor/transition.js'),
        gulp.src('./src/js/vendor/lodash.min.js'),
        gulp.src('./src/js/vendor/TweenMax.js'),
        gulp.src('./src/js/vendor/tab.js'),
        gulp.src('./src/js/vendor/modal.js'),
        gulp.src('./src/js/vendor/dropdown.js'),
        gulp.src('./src/js/vendor/bootstrap-multiselect.js'),
        gulp.src('./src/js/vendor/button.js'),
        gulp.src('./src/js/vendor/collapse.js'),
        gulp.src('./src/js/vendor/slick.min.js'),
        gulp.src('./src/js/vendor/jquery.validate.js'),
        gulp.src('./src/js/vendor/jquery-ui-1.12.1.custom/jquery-ui.js'),
        gulp.src('./src/js/vendor/sly.js'),
        gulp.src('./src/js/vendor/masked.js')
        // gulp.src('./src/js/vendor/hammer.min.js'),
        // gulp.src('./src/js/vendor/hammer.jquery.min.js')
    )


        .pipe(concat('vendors.js'))
        .pipe(gulpif(productionMode, uglify()))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('./build/js'))
        .pipe(notify("Vendor script task complete"));
});


// gulp.task('vendorsJs', function () {
//     return streamqueue({objectMode: true},
//         gulp.src('./src/js/vendor/*.js')
//     )
//         .pipe(concat('vendors.js'))
//         .pipe(uglify())
//         .pipe(rename({suffix: '.min'}))
//         .pipe(gulp.dest('./build/js'))
//         .pipe(notify("Vendor script task complete"));
// });

gulp.task('scriptsJs', function() {
    return streamqueue({ objectMode: true },
        gulp.src('./src/js/custom/reserve_date_picker.js'),
        gulp.src('./src/js/custom/HomeSlider.js'),
        gulp.src('./src/js/custom/custom-global.js'),
        gulp.src('./src/js/custom/ajax_for_contact_forms.js')
    )

        .pipe(concat('custom.js'))
        .pipe(gulpif(productionMode, uglify()))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('./build/js'))
        .pipe(notify("Custom script task complete"))
});

gulp.task('scriptsAdminJs', function() {
    return streamqueue({ objectMode: true },
        gulp.src('./src/js/custom/reserve_date_picker.js')
    )

        .pipe(concat('custom_admin.js'))
        .pipe(gulpif(productionMode, uglify()))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('./build/js'))
        .pipe(notify("Custom admin script task complete"))
});


gulp.task('watch', ['styles', 'vendorsJs', 'scriptsJs', 'scriptsAdminJs'], function() {
    gulp.watch('src/css/**/*.scss', ['styles']);
    gulp.watch('src/js/vendor/*.js', ['vendorJs']);
    gulp.watch('src/js/custom/*.js', ['scriptsJs', 'scriptsAdminJs']);
});


