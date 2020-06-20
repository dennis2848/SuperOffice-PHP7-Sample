<?php
include_once(dirname(__FILE__).'/../SoAgent.php');
/**
 * SoContactAgent short summary.
 *
 * SoContactAgent description.
 *
 * @version 1.0
 * @author yanjunl
 */

		
class SoUserAgent extends SoAgent
{

	/**
     * @$endpoint       web service end point
     * @$ticket     NetServer ticket
     * @$application#token      private token of application
     * @$headerNamespace        namespace for request header
     * @$timeout        request timeout time
     * @$responseTimeout        response timeout time
     * @$portName web service port
     */
    function __construct($endpoint, $ticket = "", $applicationToken = "", $headerNamespace = "", $timeout = 0, $responseTimeout = 30, $portName = '')        
    {
        parent::__construct($endpoint."User.svc", "WcfUser.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new RoleEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New RoleEntity with default values
     */
     function CreateDefaultRoleEntity()
     {
		$result = $this->sendRequest("CreateDefaultRoleEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing RoleEntity or creates a new RoleEntity if the id parameter is empty
     * 
     * @return New or updated RoleEntity
     */
	function SaveRoleEntity($roleEntity)
	{
		$result = $this->sendRequest("SaveRoleEntity", array("RoleEntity"=>$roleEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new UntrustedCredentials.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New UntrustedCredentials with default values
     */
     function CreateDefaultUntrustedCredentials()
     {
		$result = $this->sendRequest("CreateDefaultUntrustedCredentials", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new User.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New User with default values
     */
     function CreateDefaultUser()
     {
		$result = $this->sendRequest("CreateDefaultUser", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing User or creates a new User if the id parameter is empty
     * 
     * @return New or updated User
     */
	function SaveUser($user)
	{
		$result = $this->sendRequest("SaveUser", array("User"=>$user));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the User
	 * 
	 * @$userId		The identity of the User
	 */
	function DeleteUser($userId)
	{
		$result = $this->sendRequest("DeleteUser", array("User"=>$userId));
		return $this->getResultFromResponse($result, true);
	}
        

	/** 
	 * Summary
	 * Save (adds/replaces) current credential of the same type for the user.
	 *
	 *@$userId		Primary key of the user (i.e. associate)
	 *@$credential		Credentials supported for authentication
	 *
	 *@return: True if the credential was successfully saved.
	 */
	function SaveCredential($userId, $credential)
	{
		$result = $this->sendRequest("SaveCredential", array("UserId"=>$userId, "Credential"=>$credential));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Remove credential of a specific type for a user
	 *
	 *@$userId		Primary key of the user (i.e. associate)
	 *@$credentialType		Type of credentials, corresponding to name of plugin and type in the credentials table
	 *
	 *@return: True if credential was sucessfully removed.
	 */
	function DeleteCredential($userId, $credentialType)
	{
		$result = $this->sendRequest("DeleteCredential", array("UserId"=>$userId, "CredentialType"=>$credentialType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get user groups holding users filtered by the searchString.  This method is only relevant if the CredentialType control is of type link.  There will allways be at least one groups even if the underlying provider does not support groups.
	 *
	 *@$type		Type of credentials, corresponding to name of plugin and type in the credentials table.
	 *@$searchString		Partly name of domain group.
	 *
	 *@return: 
	 */
	function FindCredentialsGroups($type, $searchString)
	{
		$result = $this->sendRequest("FindCredentialsGroups", array("Type"=>$type, "SearchString"=>$searchString));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Find users matching the partial name.
	 *
	 *@$type		Type of credentials, corresponding to name of plugin and type in the credentials table.
	 *@$searchString		Partly name of the user group
	 *
	 *@return: 
	 */
	function FindCredentialUsers($type, $searchString)
	{
		$result = $this->sendRequest("FindCredentialUsers", array("Type"=>$type, "SearchString"=>$searchString));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get available credential types that can be used for authentication
	 *
	 *
	 *@return: Credential types that can be used for authentication
	 */
	function GetCredentialTypes()
	{
		$result = $this->sendRequest("GetCredentialTypes", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get credential users within a user group
	 *
	 *@$type		Type of credentials, corresponding to name of plugin and type in the credentials table.
	 *@$groupName		Name of user group needed to discover the users.
	 *
	 *@return: 
	 */
	function GetCredentialUsersInGroup($type, $groupName)
	{
		$result = $this->sendRequest("GetCredentialUsersInGroup", array("Type"=>$type, "GroupName"=>$groupName));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Role object.
	 * 
	 * @$roleId		The identifier of the Role object
	 *
	 * @returns Role
	 */ 
	function GetRole($roleId)
	{
		$result = $this->sendRequest("GetRole", array("RoleId"=>$roleId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a RoleEntity object.
	 * 
	 * @$roleEntityId		The identifier of the RoleEntity object
	 *
	 * @returns RoleEntity
	 */ 
	function GetRoleEntity($roleEntityId)
	{
		$result = $this->sendRequest("GetRoleEntity", array("RoleEntityId"=>$roleEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * This method will delete the specified role and move all users associated with the role to the replacingRoleId
	 *
	 *@$roleIdToDelete		The roleId to delete
	 *@$replacingRoleId		The roleId which all associated users will be moved to.
	 *
	 *@return: 
	 */
	function DeleteRole($roleIdToDelete, $replacingRoleId)
	{
		$result = $this->sendRequest("DeleteRole", array("RoleIdToDelete"=>$roleIdToDelete, "ReplacingRoleId"=>$replacingRoleId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get a list of all roles for the given type of role. MDO List name = 'Roles', extra='0' (roleType) 
	 *
	 *@$roleType		Type of role (Employee/External/Anonymous/System)
	 *
	 *@return: FunctionRight items with name and description. Code name for function right is in the extra-info property.
	 */
	function GetAllRoles($roleType)
	{
		$result = $this->sendRequest("GetAllRoles", array("RoleType"=>$roleType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a list of all functional rights for the given type of role. MDO List name = 'FunctionRights', extra='roleType=0' 
	 *
	 *@$roleType		Type of role (Employee/External/Anonymous/System)
	 *
	 *@return: FunctionRight items with name and description. Code name for function right is in the extra-info property.
	 */
	function GetAllFunctionalRights($roleType)
	{
		$result = $this->sendRequest("GetAllFunctionalRights", array("RoleType"=>$roleType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all functional rights for the given role. Functional rights not set on the role are not included. MDO List name = 'FunctionRights', extra='role=123'
	 *
	 *@$roleId		The role id to get the functional rights for.
	 *
	 *@return: FunctionRight items with name and description. Code name for function right is in the extra-info property.
	 */
	function GetFunctionalRights($roleId)
	{
		$result = $this->sendRequest("GetFunctionalRights", array("RoleId"=>$roleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * This method will set all functional rights for the given role. Functional rights not specified here will be removed from the role. 
	 *
	 *@$roleId		The role id to set the functional rights for
	 *@$functionalRightIds		An array of functional rights ids to set for this role. Rights not included here are removed from the role.
	 *
	 *@return: 
	 */
	function SetFunctionalRights($roleId, $functionalRightIds)
	{
		$result = $this->sendRequest("SetFunctionalRights", array("RoleId"=>$roleId, "FunctionalRightIds"=>$functionalRightIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * This method will set one specific data right at the given position. An exception will be thrown if non existing position is specified.
	 *
	 *@$roleId		The role id to set the data right for
	 *@$tableName		The name of the entity/table
	 *@$relationToOwner		The id of the relation to owner
	 *@$dataRightValue		The data right value to set at the specified position (CRUD)
	 *
	 *@return: 
	 */
	function SetDataRight($roleId, $tableName, $relationToOwner, $dataRightValue)
	{
		$result = $this->sendRequest("SetDataRight", array("RoleId"=>$roleId, "TableName"=>$tableName, "RelationToOwner"=>$relationToOwner, "DataRightValue"=>$dataRightValue));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * This method will create a new role entity of the specified role type. The role type cannot be changed after the entity is created.
	 *
	 *@$type		Type of role (Employee/External/Anonymous/System)
	 *
	 *@return: 
	 */
	function CreateDefaultRoleEntityFromType($type)
	{
		$result = $this->sendRequest("CreateDefaultRoleEntityFromType", array("Type"=>$type));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * This method will find all roles with a given set of functional rights for the given role. The roles matched must contain one or more of the specified functional rights. 
	 *
	 *@$functionalRightNames		An array of functional rights names to search for
	 *
	 *@return: Role ids that contains your functional rights
	 */
	function FindRolesWithFunctionalRights($functionalRightNames)
	{
		$result = $this->sendRequest("FindRolesWithFunctionalRights", array("FunctionalRightNames"=>$functionalRightNames));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * This method will find all roles without a given set of functional rights for the given role. The roles matched must not contain any of the specified functional rights. 
	 *
	 *@$functionalRightNames		An array of functional rights names to search for
	 *
	 *@return: Role ids that without your functional rights
	 */
	function FindRolesWithoutFunctionalRights($functionalRightNames)
	{
		$result = $this->sendRequest("FindRolesWithoutFunctionalRights", array("FunctionalRightNames"=>$functionalRightNames));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a User object.
	 * 
	 * @$userId		The identifier of the User object
	 *
	 * @returns User
	 */ 
	function GetUser($userId)
	{
		$result = $this->sendRequest("GetUser", array("UserId"=>$userId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save credentials for authenticated user.
	 *
	 *@$type		Type of credential(Ex: "imap", "smtp")
	 *@$credentials		Credentials to save.
	 *
	 *@return: 
	 */
	function SaveUntrustedCredentials($type, $credentials)
	{
		$result = $this->sendRequest("SaveUntrustedCredentials", array("Type"=>$type, "Credentials"=>$credentials));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get a set of credentials of a specified type for authenticated user.
	 *
	 *@$type		Type of credential(Ex: "imap", "smtp").
	 *
	 *@return: Array of credentials of the specified type.
	 */
	function GetUntrustedCredentials($type)
	{
		$result = $this->sendRequest("GetUntrustedCredentials", array("Type"=>$type));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a set of credentials of a specified type for a specified user. SecretValue is only populated for authenticated user, and system users.
	 *
	 *@$associateId		Id of user to retrieve credentials for.
	 *@$type		Type of credential(Ex: "imap", "smtp").
	 *
	 *@return: Array of credentials of the specified type.
	 */
	function GetUntrustedCredentialsForAssociate($associateId, $type)
	{
		$result = $this->sendRequest("GetUntrustedCredentialsForAssociate", array("AssociateId"=>$associateId, "Type"=>$type));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save credentials for a specified user.
	 *
	 *@$associateId		Id of user to save credentials for.
	 *@$type		Type of credential(Ex: "imap", "smtp")
	 *@$credentials		Credentials to save.
	 *
	 *@return: 
	 */
	function SaveUntrustedCredentialsForAssociate($associateId, $type, $credentials)
	{
		$result = $this->sendRequest("SaveUntrustedCredentialsForAssociate", array("AssociateId"=>$associateId, "Type"=>$type, "Credentials"=>$credentials));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Remove a credentials entry for authenticated user.
	 *
	 *@$type		Type of credential(Ex: "imap", "smtp")
	 *@$publicValue		PublicValue field of credentials to remove.
	 *
	 *@return: 
	 */
	function RemoveUntrustedCredentials($type, $publicValue)
	{
		$result = $this->sendRequest("RemoveUntrustedCredentials", array("Type"=>$type, "PublicValue"=>$publicValue));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Remove a credentials entry for a specified user.
	 *
	 *@$associateId		Id of user to remove credentials for.
	 *@$type		Type of credential(Ex: "imap", "smtp")
	 *@$publicValue		PublicValue field of credentials to remove.
	 *
	 *@return: 
	 */
	function RemoveUntrustedCredentialsForAssociate($associateId, $type, $publicValue)
	{
		$result = $this->sendRequest("RemoveUntrustedCredentialsForAssociate", array("AssociateId"=>$associateId, "Type"=>$type, "PublicValue"=>$publicValue));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Creates an associate of type external user.
	 *
	 *@$personId		The personId to create an external user for.
	 *@$userName		Login username.
	 *@$password		Login password.
	 *@$roleId		Id of role for the external user. The role must be a role of type external users.
	 *@$isActive		Set isActive to true to enable the external user to log in.
	 *
	 *@return: Returns the created associateId.
	 */
	function CreateExternalUser($personId, $userName, $password, $roleId, $isActive)
	{
		$result = $this->sendRequest("CreateExternalUser", array("PersonId"=>$personId, "UserName"=>$userName, "Password"=>$password, "RoleId"=>$roleId, "IsActive"=>$isActive));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes an associate of type external user.
	 *
	 *@$associateId		The associateId to delete the associate entry for.
	 *
	 *@return: 
	 */
	function DeleteExternalUser($associateId)
	{
		$result = $this->sendRequest("DeleteExternalUser", array("AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Modifies an external user. Changes external users information according to the flags set in  externalUserInfoModification.
	 *
	 *@$associateId		The associateId to alter.
	 *@$userName		Login username.
	 *@$password		Login password.
	 *@$isActive		Set isActive to true to enable the external user to log in.
	 *@$roleId		Id of role for the external user. The role must be a role of type external users.
	 *@$externalUserInfoModification		externalUserInfoModification is a flag describing what to change. <see cref="SuperOffice.CRM.Services.Util.ExternalUserInfoModification"/>.
	 *
	 *@return: 
	 */
	function SetExternalUserInfo($associateId, $userName, $password, $isActive, $roleId, $externalUserInfoModification)
	{
		$result = $this->sendRequest("SetExternalUserInfo", array("AssociateId"=>$associateId, "UserName"=>$userName, "Password"=>$password, "IsActive"=>$isActive, "RoleId"=>$roleId, "ExternalUserInfoModification"=>$externalUserInfoModification));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Generates a new password for an external user.
	 *
	 *@$associateName		The name of the associate to change the password for.
	 *
	 *@return: Returns the generated password.
	 */
	function GenerateNewPasswordForExternalUser($associateName)
	{
		$result = $this->sendRequest("GenerateNewPasswordForExternalUser", array("AssociateName"=>$associateName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Change password for a user.
	 *
	 *@$associateId		AssociateId of the user to change password for.
	 *@$oldPassword		The current password of the user.  Administrators can leave this blank to force a new password upon a user.
	 *@$newPassword		The new password for the user
	 *
	 *@return: True if the password was successfully changed.
	 */
	function ChangePassword($associateId, $oldPassword, $newPassword)
	{
		$result = $this->sendRequest("ChangePassword", array("AssociateId"=>$associateId, "OldPassword"=>$oldPassword, "NewPassword"=>$newPassword));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the user associated with the supplied person id
	 *
	 *@$personId		
	 *
	 *@return: 
	 */
	function GetUserFromPersonId($personId)
	{
		$result = $this->sendRequest("GetUserFromPersonId", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create default User providing the associate type and person id.  System and Anonymous users can be created without an exsisting person and permitts person id to be 0.
	 *
	 *@$userType		Type of associate for the user
	 *@$personId		Primary key of the person to become a user.
	 *
	 *@return: New user object with defalt values set.
	 */
	function CreateDefaultUserFromUserTypeAndPersonId($userType, $personId)
	{
		$result = $this->sendRequest("CreateDefaultUserFromUserTypeAndPersonId", array("UserType"=>$userType, "PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create default User providing the user type.  Only System and Anonymous users can be created without an exsisting person.  Use CreateDefaultUserFromUserTypeAndPersonId to create internal (i.e. Employee) or external users.
	 *
	 *@$userType		Type of associate for the user.  This can only be System or Anonymous. Use CreateDefaultUserFromUserTypeAndPersonId to create internal (i.e. Employee) or external users.
	 *
	 *@return: New user object with defalt values set.
	 */
	function CreateDefaultUserFromUserType($userType)
	{
		$result = $this->sendRequest("CreateDefaultUserFromUserType", array("UserType"=>$userType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get user from ejUserId - used for eJournal Legacy Support.
	 *
	 *@$ejUserId		ejUserId - 
	 *
	 *@return: 
	 */
	function GetUserFromEjUserId($ejUserId)
	{
		$result = $this->sendRequest("GetUserFromEjUserId", array("EjUserId"=>$ejUserId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a user from the user name.
	 *
	 *@$userName		User name of the user to get.
	 *
	 *@return: User retrieved by name
	 */
	function GetUserFromName($userName)
	{
		$result = $this->sendRequest("GetUserFromName", array("UserName"=>$userName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateName		
	 *@$password		
	 *
	 *@return: 
	 */
	function SetPasswordFromName($associateName, $password)
	{
		$result = $this->sendRequest("SetPasswordFromName", array("AssociateName"=>$associateName, "Password"=>$password));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateId		
	 *@$password		
	 *
	 *@return: 
	 */
	function SetPassword($associateId, $password)
	{
		$result = $this->sendRequest("SetPassword", array("AssociateId"=>$associateId, "Password"=>$password));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Change password for a user.
	 *
	 *@$oldPassword		The current password of the user.  Administrators can leave this blank to force a new password upon a user.
	 *@$newPassword		The new password for the user
	 *
	 *@return: True if the password was successfully changed.
	 */
	function ChangeOwnPassword($oldPassword, $newPassword)
	{
		$result = $this->sendRequest("ChangeOwnPassword", array("OldPassword"=>$oldPassword, "NewPassword"=>$newPassword));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Change password for a user.
	 *
	 *@$associateName		AssociateId of the user to change password for.
	 *@$oldPassword		The current password of the user.  Administrators can leave this blank to force a new password upon a user.
	 *@$newPassword		The new password for the user
	 *
	 *@return: True if the password was successfully changed.
	 */
	function ChangePasswordFromName($associateName, $oldPassword, $newPassword)
	{
		$result = $this->sendRequest("ChangePasswordFromName", array("AssociateName"=>$associateName, "OldPassword"=>$oldPassword, "NewPassword"=>$newPassword));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateId		
	 *@$type		
	 *@$personId		
	 *@$userName		
	 *
	 *@return: 
	 */
	function IsUserNameValid($associateId, $type, $personId, $userName)
	{
		$result = $this->sendRequest("IsUserNameValid", array("AssociateId"=>$associateId, "Type"=>$type, "PersonId"=>$personId, "UserName"=>$userName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateId		
	 *@$type		
	 *@$personId		
	 *@$password		
	 *
	 *@return: 
	 */
	function IsPasswordValid($associateId, $type, $personId, $password)
	{
		$result = $this->sendRequest("IsPasswordValid", array("AssociateId"=>$associateId, "Type"=>$type, "PersonId"=>$personId, "Password"=>$password));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateId		
	 *
	 *@return: 
	 */
	function SetGeneratedPassword($associateId)
	{
		$result = $this->sendRequest("SetGeneratedPassword", array("AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateName		
	 *
	 *@return: 
	 */
	function SetGeneratedPasswordFromName($associateName)
	{
		$result = $this->sendRequest("SetGeneratedPasswordFromName", array("AssociateName"=>$associateName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateId		
	 *@$type		
	 *@$personId		
	 *@$password		
	 *
	 *@return: 
	 */
	function IsPasswordValidWithReason($associateId, $type, $personId, $password)
	{
		$result = $this->sendRequest("IsPasswordValidWithReason", array("AssociateId"=>$associateId, "Type"=>$type, "PersonId"=>$personId, "Password"=>$password));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateId		
	 *@$type		
	 *@$personId		
	 *@$userName		
	 *
	 *@return: 
	 */
	function IsUserNameValidWithReason($associateId, $type, $personId, $userName)
	{
		$result = $this->sendRequest("IsUserNameValidWithReason", array("AssociateId"=>$associateId, "Type"=>$type, "PersonId"=>$personId, "UserName"=>$userName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a user from the user name.
	 *
	 *@$user		User name of the user to get.
	 *@$userType		
	 *
	 *@return: User retrieved by name
	 */
	function ChangeUserType($user, $userType)
	{
		$result = $this->sendRequest("ChangeUserType", array("User"=>$user, "UserType"=>$userType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a PersonEntity with default values based on the contactId and credentials.
	 *
	 *@$userType		Type of associate for the user
	 *@$contactId		Contact id of the person
	 *@$credentialType		Type of credentials, corresponding to name of plugin and type in the credentials table.
	 *@$credentialValue		This is the actuall value of the credentials.  This will typically be the password or teh users SID in active directory
	 *@$credentialDisplayValue		The value displayed to the user. this will typically be the users login name in active directory.
	 *
	 *@return: 
	 */
	function CreateDefaultUserFromUserTypeAndCredential($userType, $contactId, $credentialType, $credentialValue, $credentialDisplayValue)
	{
		$result = $this->sendRequest("CreateDefaultUserFromUserTypeAndCredential", array("UserType"=>$userType, "ContactId"=>$contactId, "CredentialType"=>$credentialType, "CredentialValue"=>$credentialValue, "CredentialDisplayValue"=>$credentialDisplayValue));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateId		
	 *@$type		
	 *@$personId		
	 *@$userName		
	 *
	 *@return: 
	 */
	function GetValidUserName($associateId, $type, $personId, $userName)
	{
		$result = $this->sendRequest("GetValidUserName", array("AssociateId"=>$associateId, "Type"=>$type, "PersonId"=>$personId, "UserName"=>$userName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Remove all user licenses.
	 *
	 *@$associateId		
	 *
	 *@return: 
	 */
	function RemoveLicenses($associateId)
	{
		$result = $this->sendRequest("RemoveLicenses", array("AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Retiring a user means to remove all licenses, setting person.retired=1 and associate.deleted=1. Unretiering a user means setting  person.retired=0 and associate.deleted=0
	 *
	 *@$associateId		
	 *@$retired		
	 *
	 *@return: 
	 */
	function MakeRetired($associateId, $retired)
	{
		$result = $this->sendRequest("MakeRetired", array("AssociateId"=>$associateId, "Retired"=>$retired));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$contactId		Id of the contact to add as a owner contact
	 *
	 *@return: 
	 */
	function AddOwnerContact($contactId)
	{
		$result = $this->sendRequest("AddOwnerContact", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Remove a contact from the ownercontactlink table
	 *
	 *@$contactId		The id of the contact to remove
	 *
	 *@return: 
	 */
	function RemoveOwnerContact($contactId)
	{
		$result = $this->sendRequest("RemoveOwnerContact", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get a user from the provided information. If the user or associated person does not exist, it will be created on demand.
	 *
	 *@$contactId		The contact Id of the contact which the person belongs to. Cannot be 0.
	 *@$personName		The full name of the person to be resolved. Optional.
	 *@$phoneNumbers		Phone numbers registered on the person. Optional.
	 *@$emails		Email-addresses registered on the person. Optional.
	 *@$userType		The type of user to look up or create.
	 *@$credential		The credentials to be used for the user. Required.
	 *
	 *@return: The results of the resolve-operation.
	 */
	function ResolveUserFromInfo($contactId, $personName, $phoneNumbers, $emails, $userType, $credential)
	{
		$result = $this->sendRequest("ResolveUserFromInfo", array("ContactId"=>$contactId, "PersonName"=>$personName, "PhoneNumbers"=>$phoneNumbers, "Emails"=>$emails, "UserType"=>$userType, "Credential"=>$credential));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a UserGroup object.
	 * 
	 * @$userGroupId		The identifier of the UserGroup object
	 *
	 * @returns UserGroup
	 */ 
	function GetUserGroup($userGroupId)
	{
		$result = $this->sendRequest("GetUserGroup", array("UserGroupId"=>$userGroupId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save a user group.  Set UserGroup.Deleted to mark a user group as deleted and invisible in the user interface.
	 *
	 *@$userGroup		UserGroup to save
	 *
	 *@return: UserGroup as saved to the database
	 */
	function SaveUserGroup($userGroup)
	{
		$result = $this->sendRequest("SaveUserGroup", array("UserGroup"=>$userGroup));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all user groups
	 *
	 *@$includeDeleted		Include user groups with Deleted set to true
	 *
	 *@return: All user groups
	 */
	function GetAllUserGroups($includeDeleted)
	{
		$result = $this->sendRequest("GetAllUserGroups", array("IncludeDeleted"=>$includeDeleted));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create UserGroup (Rank is assigned to the highest rank)
	 *
	 *
	 *@return: 
	 */
	function CreateUserGroup()
	{
		$result = $this->sendRequest("CreateUserGroup", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Delete a usergroup and move its members to another usergroup
	 *
	 *@$userGroupToDelete		The id of the userGroup to delete
	 *@$userGroupToMoveTo		The id of the userGroup to move the members to
	 *
	 *@return: 
	 */
	function DeleteUserGroup($userGroupToDelete, $userGroupToMoveTo)
	{
		$result = $this->sendRequest("DeleteUserGroup", array("UserGroupToDelete"=>$userGroupToDelete, "UserGroupToMoveTo"=>$userGroupToMoveTo));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets an array of UserGroup objects.
	 * 
	 * @$userGroupIds		The identifiers of the UserGroup object
	 *
	 * @returns Array of UserGroup objects
	 */ 
	function GetUserGroupList($userGroupIds)
	{
		$result = $this->sendRequest("GetUserGroupList", array("UserGroupIds"=>$userGroupIds));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a UserInfo object.
	 * 
	 * @$userInfoId		The identifier of the UserInfo object
	 *
	 * @returns UserInfo
	 */ 
	function GetUserInfo($userInfoId)
	{
		$result = $this->sendRequest("GetUserInfo", array("UserInfoId"=>$userInfoId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of UserInfo objects.
	 * 
	 * @$userInfoIds		The identifiers of the UserInfo object
	 *
	 * @returns Array of UserInfo objects
	 */ 
	function GetUserInfoList($userInfoIds)
	{
		$result = $this->sendRequest("GetUserInfoList", array("UserInfoIds"=>$userInfoIds));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

