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
            'migrate' => 'drupal',
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
            'advagg_bundler' => 'advagg',
            'advagg_css_cdn' => 'advagg',
            'advagg_js_cdn' => 'advagg',
            'advagg_css_compress' => 'advagg',
            'advagg_js_compress' => 'advagg',
            'advagg_validator' => 'advagg',
            'advagg_mod' => 'advagg',
            'domain_alias' => 'domain',
            'domain_conf' => 'domain',
            'domain_content' => 'domain',
            'domain_nav' => 'domain',
            'domain_settings' => 'domain',
            'domain_source' => 'domain',
            'domain_strict' => 'domain',
            'fe_block' => 'features_extra',
            'fe_nodequeue' => 'features_extra',
            'fe_profile' => 'features_extra',
            'features_extra_test' => 'features_extra',
            'feeds_ui' => 'feeds',
            'feeds_import' => 'feeds',
            'feeds_news' => 'feeds',
            'feeds_tamper_ui' => 'feeds',
            'entityreference_behavior_example' => 'entityreference',
            'node_reference' => 'references',
            'user_reference' => 'references',
            'awssdk_ui' => 'awssdk',
            'media_bulk_upload' => 'media',
            'media_internet' => 'media',
            'media_migrate_file_types' => 'media',
            'media_wysiwyg' => 'media',
            'media_wysiwyg_view_mode' => 'media',
            'mediafield' => 'media',
            'video_embed_facebook' => 'video_embed_field',
            'i18n_block' => 'i18n',
            'i18n_contact' => 'i18n',
            'i18n_field' => 'i18n',
            'i18n_forum' => 'i18n',
            'i18n_menu' => 'i18n',
            'i18n_node' => 'i18n',
            'i18n_path' => 'i18n',
            'i18n_redirect' => 'i18n',
            'i18n_select' => 'i18n',
            'i18n_string' => 'i18n',
            'i18n_sync' => 'i18n',
            'i18n_taxonomy' => 'i18n',
            'i18n_translation' => 'i18n',
            'i18n_user' => 'i18n',
            'i18n_variable' => 'i18n',
            'i18n_hreflang' => 'i18n_contrib',
            'i18n_menu_select' => 'i18n_contrib',
            'i18n_entityreference' => 'i18n_contrib',
            'i18n_references' => 'i18n_contrib',
            'job_scheduler_trigger' => 'job_scheduler',
            'patternbuilder_importer' => 'patternbuilder',
            'paragraphs_bundle_permissions' => 'paragraphs',
            'paragraphs_i18n' => 'paragraphs',
            'path_breadcrumbs_i18n' => 'path_breadcrumbs',
            'path_breadcrumbs_ui' => 'path_breadcrumbs',
            'memcache_admin' => 'memcache',
            'flexslider_picture' => 'picture',
            'current_search' => 'facetapi',
            'metatag_app_links' => 'metatag',
            'metatag_context' => 'metatag',
            'metatag_dc' => 'metatag',
            'metatag_dc_advanced' => 'metatag',
            'metatag_devel' => 'metatag',
            'metatag_facebook' => 'metatag',
            'metatag_favicons' => 'metatag',
            'metatag_google_plus' => 'metatag',
            'metatag_hreflang' => 'metatag',
            'metatag_importer' => 'metatag',
            'metatag_mobile' => 'metatag',
            'metatag_opengraph' => 'metatag',
            'metatag_opengraph_products' => 'metatag',
            'metatag_panels' => 'metatag',
            'metatag_twitter_cards' => 'metatag',
            'metatag_verification' => 'metatag',
            'metatag_views' => 'metatag',
            'rest_server' => 'services',
            'services_oauth' => 'services',
            'xmlrpc_server' => 'services',
            'services_entityreference' => 'services_entity',
            'record_shorten' => 'shorten',
            'shorten_cs' => 'shorten',
            'shortener' => 'shorten',
            'state_flow' => 'state_machine',
            'state_flow_schedule' => 'state_machine',
            'state_flow_sps' => 'state_machine',
            'traceview_context' => 'traceview',
            'traceview_early' => 'traceview',
            'traceview_late' => 'traceview',
            'traceview_services' => 'traceview',
            'views_url_alias_node' => 'views_url_alias',
            'variable_admin' => 'variable',
            'variable_example' => 'variable',
            'variable_realm' => 'variable',
            'variable_store' => 'variable',
            'variable_views' => 'variable',
            'xmlsitemap_custom' => 'xmlsitemap',
            'xmlsitemap_engines' => 'xmlsitemap',
            'xmlsitemap_i18n' => 'xmlsitemap',
            'xmlsitemap_menu' => 'xmlsitemap',
            'xmlsitemap_modal' => 'xmlsitemap',
            'xmlsitemap_node' => 'xmlsitemap',
            'xmlsitemap_taxonomy' => 'xmlsitemap',
            'xmlsitemap_user' => 'xmlsitemap',
        ]);
    }
}
