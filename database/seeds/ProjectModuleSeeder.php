<?php

use App\ModuleStatus\Models\Entities\ProjectModule;
use Illuminate\Database\Seeder;

class ProjectModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this
            ->getList()
            ->each(function ($item, $key) {
                ProjectModule::updateOrCreate(['name' => $key, 'project_name' => $item, 'verified' => true]);
            });
    }

    protected function getList()
    {
        return collect([
            'aggregator' => 'drupal',
            'block' => 'drupal',
            'blog' => 'drupal',
            'book' => 'drupal',
            'color' => 'drupal',
            'comment' => 'drupal',
            'contact' => 'drupal',
            'translation' => 'drupal',
            'contextual' => 'drupal',
            'dashboard' => 'drupal',
            'dblog' => 'drupal',
            'field' => 'drupal',
            'field_sql_storage' => 'drupal',
            'field_ui' => 'drupal',
            'file' => 'drupal',
            'filter' => 'drupal',
            'forum' => 'drupal',
            'help' => 'drupal',
            'image' => 'drupal',
            'list' => 'drupal',
            'locale' => 'drupal',
            'menu' => 'drupal',
            'node' => 'drupal',
            'number' => 'drupal',
            'openid' => 'drupal',
            'options' => 'drupal',
            'overlay' => 'drupal',
            'path' => 'drupal',
            'php' => 'drupal',
            'poll' => 'drupal',
            'rdf' => 'drupal',
            'search' => 'drupal',
            'shortcut' => 'drupal',
            'statistics' => 'drupal',
            'syslog' => 'drupal',
            'system' => 'drupal',
            'taxonomy' => 'drupal',
            'simpletest' => 'drupal',
            'text' => 'drupal',
            'toolbar' => 'drupal',
            'tracker' => 'drupal',
            'trigger' => 'drupal',
            'update' => 'drupal',
            'user' => 'drupal',
            'bartik' => 'drupal',
            'garland' => 'drupal',
            'seven' => 'drupal',
            'stark' => 'drupal',
            'views' => 'drupal',
            'views_ui' => 'drupal',
            'entity_token' => 'drupal',
            'migrate_example' => 'drupal',
            'migrate_example_baseball' => 'drupal',
            'migrate_example_oracle' => 'drupal',
            'migrate_extras_media' => 'drupal',
            'migrate_extras_pathauto' => 'drupal',
            'migrate_extras_profile2' => 'drupal',
            'bulk_export' => 'ctools',
            'ctools_ajax_sample' => 'ctools',
            'ctools_plugin_example' => 'ctools',
            'ctools_custom_content' => 'ctools',
            'ctools_access_ruleset' => 'ctools',
            'page_manager' => 'ctools',
            'stylizer' => 'ctools',
            'term_depth' => 'ctools',
            'views_content' => 'ctools',
            'panels_mini' => 'panels',
            'panels_node' => 'panels',
            'panels_ipe' => 'panels',
            'i18n_panels' => 'panels',
            'admin_devel' => 'admin_menu',
            'admin_menu_toolbar' => 'admin_menu',
            'actions_permissions' => 'views_bulk_operations',
            'charts_google' => 'charts',
            'charts_highcharts' => 'charts',
            'date_all_day' => 'date',
            'date_api' => 'date',
            'date_context' => 'date',
            'date_migrate_example' => 'date',
            'date_popup' => 'date',
            'date_repeat' => 'date',
            'date_repeat_field' => 'date',
            'date_tools' => 'date',
            'date_views' => 'date',
            'taarikh_api' => 'taarikh',
            'devel_generate' => 'devel',
            'ds_devel' => 'ds',
            'ds_extras' => 'ds',
            'ds_format' => 'ds',
            'ds_forms' => 'ds',
            'ds_search' => 'ds',
            'ds_ui' => 'ds',
            'image_effects_text' => 'imagecache_actions',
            'image_effects_text_test' => 'imagecache_actions',
            'image_styles_admin' => 'imagecache_actions',
            'imagecache_autorotate' => 'imagecache_actions',
            'imagecache_canvasactions' => 'imagecache_actions',
            'imagecache_coloractions' => 'imagecache_actions',
            'imagecache_customactions' => 'imagecache_actions',
            'imagecache_testsuite' => 'imagecache_actions',
            'video_ui' => 'video',
            'zencoderapi' => 'video',
            'rules_admin' => 'rules',
            'rules_i18n' => 'rules',
            'rules_scheduler' => 'rules',
            'oauth_common_providerui' => 'oauth',
            'help_example' => 'advanced_help',
            'geofield_map' => 'geofield',
            'leaflet_views' => 'leaflet',
            'leaflet_demo' => 'leaflet_more_maps',
            'quicktabs_tabstyles' => 'quicktabs',
            'google_analytics_reports_api' => 'google_analytics_reports',
        ]);
    }
}
