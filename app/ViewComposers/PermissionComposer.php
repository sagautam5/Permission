<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 3/9/19
 * Time: 5:03 PM
 */

namespace App\ViewComposers;

use App\Permission\Services\Permissions\PermissionService;
use Illuminate\View\View;

class PermissionComposer
{
    protected $permission;

    public function __construct(PermissionService $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('permissions', $this->permission->currentUserPermissions());
    }
}