<?php
namespace Magecomp\Productimageinorder\ViewModel;

use Magecomp\Productimageinorder\Helper\Data as ProductImgHelper;
use Magento\Catalog\Helper\Image as HelperImage;

class Imageinorder implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    const IMAGEWIDTH = 200;
    const IMAGEHEIGTH = 200;

    const IMAGEWIDTHLARGE = 500;
    const IMAGEHEIGTHLARGE = 500;


    protected $helperImg;
    protected $productImgHelper;

    public function __construct( HelperImage $helperImg, ProductImgHelper $productImgHelper )
    {
        $this->helperImg = $helperImg;
        $this->productImgHelper = $productImgHelper;
    }

    public function isEnbaled()
    {
        return $this->productImgHelper->isEnabled();
    }

    public function getImageUrl( $product )
    {
        return $this->helperImg->init($product, 'base')->setImageFile($product->getSmallImage())->resize(self::IMAGEWIDTH, self::IMAGEHEIGTH)->getUrl();
    }

    public function getImageUrlLarge( $product )
    {
        return $this->helperImg->init($product, 'large_image')->setImageFile($product->getSmallImage())->resize(self::IMAGEWIDTHLARGE, self::IMAGEHEIGTHLARGE)->getUrl();
    }

    public function getAllImages( $product )
    {
        $test = $product->getMediaGalleryImages();
        return $test;
    }
}