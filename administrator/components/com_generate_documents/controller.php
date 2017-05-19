<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Generate_documents
 * @author     Rome Lindaro <pro_fesor@mail.ru>
 * @copyright  2017 Rome Lindaro
 * @license    GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

require_once JPATH_SITE.'/vendor/autoload.php';
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

/**
 * Class Generate_documentsController
 *
 * @since  1.5
 */
class Generate_documentsController extends JController
{
    private $db;
    private $view;

    public function __construct(array $config = array())
    {
        parent::__construct($config);

        $this->view = $this->getView('adduser', 'html');
        $this->db = JFactory::getDBO();
    }

    /**
     * Method to display a view.
     *
     * @param   boolean $cachable If true, the view output will be cached
     * @param   mixed $urlparams An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
     *
     * @return  JController        This object to support chaining.
     *
     * @since    1.5
     */
    public function display($cachable = false, $urlparams = false)
    {
        JRequest::setVar('view', 'adduser');

        //$user = $this->getUser();

        $this->db->setQuery("SELECT DISTINCT `country` FROM `patent_jtmb_members_directory`");
        $countries = (array)$this->db->loadObjectList();

        foreach ($countries as &$country) {
            $country->name = $this->getCountryList($country->country);
        }

        $this->view->assign('countries', $countries);

        $post = JRequest::get('post');
        if (!empty($post)) {
            $this->process($post);
        }

        return parent::display();
    }

    private function getCountryList($key)
    {
        $countries['FR'] = 'Фрунзенский';
        $countries['СТ'] = 'Центральный';
        $countries['SV'] = 'Советский';
        $countries['PM'] = 'Партизанский';
        $countries['PT'] = 'Фрунзенский';
        $countries['ZV'] = 'Заводской';
        $countries['OK'] = 'Октябрьский';
        $countries['LN'] = 'Ленинский';
        $countries['MC'] = 'Московский';

        return isset($countries[$key]) ? $countries[$key] : null;
    }

    private function process($post)
    {
        $countries = "('".implode("','", $post['countries'])."')";
        //var_dump($countries);

        $this->db->setQuery("SELECT * FROM `patent_jtmb_members_directory` WHERE `country` IN ".$countries);
        $users = (array)$this->db->loadObjectList();
        //var_dump($users);

        switch ($post['type']) {
            case 'list':
                $this->view->assign('files', $this->generateList($users, $post));

                break;
            case 'generate':
                $this->view->assign('files', $this->generate($users, $post));

                break;
            case 'mail':
                break;
        }
    }

    private function generate($users, $params)
    {
        $from = $params['from'];
        $order = $params['order'];
        $topic = $params['topic'];
        $text = $params['text'];

        $files = [];
        $homeUrl = 'http://'.JFactory::getURI()->getHost() . '/administrator/';

        $phpWord = new PhpWord();

        foreach ($users as $user) {
            $section = $phpWord->addSection();
            $section->addText(
                'ОТ ' .$from
                .' # ' .$order
                .$user->city . ', ' . $user->state,
                array('bold' => true, 'size' => 14)
            );

            $section = $phpWord->addSection(array('breakType' => 'continuous'));
            $section->addText(
                'Члену ОО'
                .$user->name
                .$user->city . ', ' . $user->state
            );

            $section = $phpWord->addSection(array('breakType' => 'continuous'));
            $section->addText(
                $text,
                array('name' => 'Tahoma', 'size' => 10)
            );

            $section->addPageBreak();
        }

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $fName = 'files/'.time().'.docx';
        $objWriter->save($fName);

        $files[] = [
            'url' => $homeUrl.$fName,
            'name' => 'Users',
        ];

        return $files;
    }

    private function generateList($users, $params)
    {
        $from = $params['from'];
        $order = $params['order'];
        $topic = $params['topic'];
        $text = $params['text'];

        $files = [];
        $homeUrl = 'http://'.JFactory::getURI()->getHost() . '/administrator/';

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $header = array('size' => 16, 'bold' => true);
        $section->addText('List users', $header);

        $table = $section->addTable();

        $headers = array(
            'Имя', 'Адрес'
        );
        $table->addRow();
        foreach ($headers as $headeritem) {
            $table->addCell(1750)->addText($headeritem);
        }

        foreach ($users as $user) {
            $table->addRow();
            $table->addCell(1750)->addText($user->name);
            $table->addCell(1750)->addText($user->city . ', ' . $user->state);
        }

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $fName = 'files/'.time().'.docx';
        $objWriter->save($fName);

        $files[] = [
            'url' => $homeUrl.$fName,
            'name' => 'List',
        ];

        return $files;
    }
}
