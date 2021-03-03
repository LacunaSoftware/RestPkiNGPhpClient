<?php


namespace Lacuna\RestPki;

/**
 * Class CertificateSummary
 * @package Lacuna\RestPki
 *
 * @property-read string Thumbprint
 * @property-read string SubjectCommonName
 * @property-read string SubjectDisplayName
 * @property-read string SubjectIdentifier
 * @property-read string EmailAddress
 * @property-read string Organization
 * @property-read string OrganizationIdentifier
 */
class CertificateSummary
{
    public $_thumbprint;
    public $_subjectCommonName;
    public $_subjectDisplayName;
    public $_subjectIdentifier;
    public $_emailAddress;
    public $_organization;
    public $_organizationIdentifier;

    public function __construct($model)
    {
        $this->_thumbprint = $model->thumbprint;
        $this->_subjectCommonName = $model->subjectCommonName;
        $this->_subjectDisplayName = $model->subjectDisplayName;
        $this->_subjectIdentifier = $model->subjectIdentifier;
        $this->_emailAddress = $model->emailAddress;
        $this->_organization = $model->organization;
        $this->_organizationIdentifier = $model->organizationIdentifier;
    }

    public function getThumbprint()
    {
        return $this->_thumbprint;
    }

    public function getSubjectCommonName()
    {
        return $this->_subjectCommonName;
    }

    public function getSubjectDisplayName()
    {
        return $this->_subjectDisplayName;
    }

    public function getSubjectIdentifier()
    {
        return $this->_subjectIdentifier;
    }

    public function getEmailAddress()
    {
        return $this->_emailAddress;
    }

    public function getOrganization()
    {
        return $this->_organization;
    }

    public function getOrganizationIdentifier()
    {
        return $this->_organizationIdentifier;
    }

    public function __get($attr)
    {
        switch ($attr) {
            case "thumbprint":
                return $this->getThumbprint();
            case "subjectCommonName":
                return $this->getSubjectCommonName();
            case "subjectDisplayName":
                return $this->getSubjectDisplayName();
            case "subjectIdentifier":
                return $this->getSubjectIdentifier();
            case "emailAddress":
                return $this->getEmailAddress();
            case "organization":
                return $this->getOrganization();
            case "organizationIdentifier":
                return $this->getOrganizationIdentifier();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $attr);
                return null;
        }
    }

    public function __isset($attr)
    {
        switch ($attr) {
            case "thumbprint":
                return isset($this->_thumbprint);
            case "subjectCommonName":
                return isset($this->_subjectCommonName);
            case "subjectDisplayName":
                return isset($this->_subjectDisplayName);
            case "subjectIdentifier":
                return isset($this->_subjectIdentifier);
            case "emailAddress":
                return isset($this->_emailAddress);
            case "organization":
                return isset($this->_organization);
            case "organizationIdentifier":
                return isset($this->_organizationIdentifier);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $attr);
                return null;
        }
    }
}
