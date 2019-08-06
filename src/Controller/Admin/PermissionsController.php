<?php
namespace App\Controller\Admin;

use App\Acl;
use App\Form\EntityForm;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PermissionsController extends AbstractAdminCrudController
{
    /**
     * @param EntityForm $form
     *
     * @see \App\Provider\AdminProvider
     */
    public function __construct(EntityForm $form)
    {
        parent::__construct($form);
        $this->csrf_namespace = 'admin_permissions';
    }

    public function indexAction(Request $request, Response $response): ResponseInterface
    {
        $all_roles = $this->em->createQuery(/** @lang DQL */'SELECT 
            r, rp, s 
            FROM App\Entity\Role r 
            LEFT JOIN r.users u 
            LEFT JOIN r.permissions rp 
            LEFT JOIN rp.station s 
            ORDER BY r.id ASC')
            ->getArrayResult();

        $roles = [];

        $actions = Acl::listPermissions();

        foreach ($all_roles as $role) {
            $role['permissions_global'] = [];
            $role['permissions_station'] = [];

            foreach ($role['permissions'] as $permission) {
                if ($permission['station']) {
                    $role['permissions_station'][$permission['station']['name']][] = $actions['station'][$permission['action_name']];
                } else {
                    $role['permissions_global'][] = $actions['global'][$permission['action_name']];
                }
            }

            $roles[] = $role;
        }

        return \App\Http\RequestHelper::getView($request)->renderToResponse($response, 'admin/permissions/index', [
            'roles' => $roles,
            'csrf' => \App\Http\RequestHelper::getSession($request)->getCsrf()->generate($this->csrf_namespace),
        ]);
    }

    public function editAction(Request $request, Response $response, $id = null): ResponseInterface
    {
        if (false !== $this->_doEdit($request, $id)) {
            \App\Http\RequestHelper::getSession($request)->flash('<b>' . sprintf(($id) ? __('%s updated.') : __('%s added.'), __('Permission')) . '</b>', 'green');
            return $response->withRedirect($request->getRouter()->named('admin:permissions:index'));
        }

        return \App\Http\RequestHelper::getView($request)->renderToResponse($response, 'system/form_page', [
            'form' => $this->form,
            'render_mode' => 'edit',
            'title' => sprintf(($id) ? __('Edit %s') : __('Add %s'), __('Permission')),
        ]);
    }

    public function deleteAction(Request $request, Response $response, $id, $csrf_token): ResponseInterface
    {
        $this->_doDelete($request, $id, $csrf_token);

        \App\Http\RequestHelper::getSession($request)->flash('<b>' . __('%s deleted.', __('Permission')) . '</b>', 'green');
        return $response->withRedirect($request->getRouter()->named('admin:permissions:index'));
    }
}
