<?php
namespace Concrete\Package\ConcreteMobileMenu;

use Concrete\Core\Asset\Asset;
use Concrete\Core\Asset\AssetList;
use Concrete\Core\Http\ResponseAssetGroup;
use Concrete\Core\Page\Page;
use Concrete\Core\Support\Facade\Events;
use Package;

defined('C5_EXECUTE') or die("Access Denied.");

/**
 * Package adding mobile menu base to concrete5.
 *
 * @author Oliver Green <dubious@codeblog.co.uk>
 * @link http://www.codeblog.co.uk
 * @license http://www.gnu.org/licenses/gpl.html GPLs
 */
class Controller extends Package
{
    /**
     * Package handle.
     *
     * @var string
     */
    protected $pkgHandle = 'concrete-mobile-menu';

    /**
     * Minimum concrete5 version.
     *
     * @var string
     */
    protected $appVersionRequired = '5.7.1';

    /**
     * Package version.
     *
     * @var string
     */
    protected $pkgVersion = '1.0';

    /**
     * On CMS boot.
     *
     * @return void
     */
    public function on_start()
    {
        $this->registerAssets();

        Events::addListener('on_before_render', function ($e) {
            $c = Page::getCurrentPage();

            if ($c instanceof Page) {
                $r = ResponseAssetGroup::get();

                if (!$c->isEditMode()) {
                    $r->requireAsset('mmenu');

                    $js = "<script>var CCM_SITE_NAME = '".h(\Config::get('concrete.site'))."';</script>";

                    $v = \View::getInstance();
                    $v->addHeaderItem($js);
                }
            }
        });
    }

    /**
     * Get the package name.
     *
     * @return string
     */
    public function getPackageName()
    {
        return t("Mobile Menu Components");
    }

    /**
     * Get the package description.
     *
     * @return string
     */
    public function getPackageDescription()
    {
        return t("Package adding mmenu mobile menu to your site.");
    }

    /**
     * Install routine.
     *
     * @return \Concrete\Core\Package\Package
     */
    public function install()
    {
        $pkg = parent::install();

        return $pkg;
    }

    /**
     * Removal routine.
     *
     * @return void
     */
    public function uninstall()
    {
        parent::uninstall();
    }

    /**
     * Register the assets that the package provides.
     *
     * @return void
     */
    protected function registerAssets()
    {
        // Items must go in the header to prevent 'twitches' onload.
        $al = AssetList::getInstance();

        /*
         * Mmenu
         */
        $al->register(
            'javascript',
            'mmenu/js',
            'assets/mmenu/js/jquery.mmenu.min.js',
            array(
                'version' => '3.6.6', 'position' => Asset::ASSET_POSITION_FOOTER,
                'minify' => true, 'combine' => true
            ),
            $this
        );

        $al->register(
            'css',
            'mmenu/css',
            'assets/styles.css',
            array(
                'version' => '3.6.6', 'position' => Asset::ASSET_POSITION_FOOTER,
                'minify' => true, 'combine' => true
            ),
            $this
        );

        /*
         * Bootstraper
         */
        $al->register(
            'javascript',
            'mmenu/bootstrap',
            'assets/bootstrap.js',
            array(
                'version' => '0.9.0', 'position' => Asset::ASSET_POSITION_FOOTER,
                'minify' => true, 'combine' => true
            ),
            $this
        );

        $al->registerGroup(
            'mmenu',
            array(
                array('javascript', 'mmenu/js'),
                array('javascript', 'mmenu/bootstrap'),
                array('css', 'mmenu/css'),
            )
        );
    }
}
