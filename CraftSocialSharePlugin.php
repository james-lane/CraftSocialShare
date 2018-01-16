<?php
namespace Craft;

class CraftSocialSharePlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Craft Social Share');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'James Lane';
    }

    function getDeveloperUrl()
    {
        return 'https://www.jameslane.co.uk';
    }




    /* SETTINGS */

    protected function defineSettings()
    {
        return array(
            'appId' => array(AttributeType::String)
        );
    }

    public function getSettingsHtml()
    {
       return craft()->templates->render('craftsocialshare/_settings', array(
           'settings' => $this->getSettings()
       ));
   }




   /* ENTRY WIDGET */
  public function init()
  {
      craft()->templates->hook('cp.entries.edit.right-pane', function(&$context) {
          /** @var EntryModel $entry **/
          $entry = $context['entry'];

          // Make sure this is the correct section
          if ($entry->sectionId == 2) {
              // Return the button HTML
              $url = UrlHelper::getUrl('some/path/'.$entry->id);
              return '<div id="socialShare" class="pane meta"><a href="'.$url.'" class="btn">My Button!</a></div>';
          }
      });
  }
}
