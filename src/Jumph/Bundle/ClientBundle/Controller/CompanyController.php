<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\Controller;

use Jumph\Bundle\ClientBundle\Entity\Company;
use Jumph\Bundle\ClientBundle\Form\Type\CompanyType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

class CompanyController extends Controller
{

    /**
     * @Template("JumphClientBundle:Company:overview.html.twig")
     *
     * Company overview page
     *
     * @return Response A Response instance
     */
    public function overviewAction()
    {
        return array();
    }

    /**
     * @Template("JumphClientBundle:Company:view.html.twig")
     * @ParamConverter("Company", class="JumphClientBundle:Company")
     *
     * View company
     *
     * @param Company $company
     *
     * @return Response A Response instance
     */
    public function viewAction(Company $company)
    {
        return array();
    }

    /**
     * @Template("JumphClientBundle:Company:form.html.twig")
     *
     * Add company
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function addAction(Request $request)
    {
        $company = new Company();
        $companyForm = $this->createForm(new CompanyType(), $company);

        if ($request->isMethod('POST')) {
            return $this->redirect($this->generateUrl('jumph_company_overview'));
        }

        return array(
            'companyForm' => $companyForm->createView()
        );
    }

    /**
     * @Template("JumphClientBundle:Company:form.html.twig")
     * @ParamConverter("Company", class="JumphClientBundle:Company")
     *
     * Edit company
     *
     * @param Request $request A Request instance
     * @param Company $company
     *
     * @return Response A Response instance
     */
    public function editAction(Request $request, Company $company)
    {
        $companyForm = $this->createForm(new CompanyType(), $company);

        if ($request->isMethod('POST')) {
            return $this->redirect($this->generateUrl('jumph_company_overview'));
        }

        return array(
            'companyForm' => $companyForm->createView()
        );
    }

    /**
     * Delete company
     *
     * @param Company $company
     *
     * @return Response A Response instance
     */
    public function deleteAction()
    {
        return $this->redirect($this->generateUrl('jumph_company_overview'));
    }
}
