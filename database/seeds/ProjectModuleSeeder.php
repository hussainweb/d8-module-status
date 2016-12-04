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
            'admin_menu_toolbar' => 'admin_menu',
        ]);
    }
}
