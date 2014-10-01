<?php 
class WebUser extends CWebUser
{    
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    public function checkAccess($operation, $params=array())
    {       
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        $role = $this->getState("roles");

        if ($role === '1') {
            $role = "admin"; // admin role has access to everything
        }
        if ($role === '2') {
            $role = "approval"; // admin role has access to everything
        }
        if ($role === '3') {
            $role = "inputter"; // admin role has access to everything
        }
        if ($role === '4') {
            $role = "user"; // admin role has access to everything
        }
        // allow access if the operation request is the current user's role
        return ($operation === $role);
    }
}