<?php
namespace Magecomp\Productimageinorder\ViewModel;

use Magecomp\Productimageinorder\Helper\Data as ProductImgHelper;
use Magento\Catalog\Helper\Image as HelperImage;

class Imageinorder implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    final const IMAGEWIDTH = 200;
    final const IMAGEHEIGTH = 200;

    final const IMAGEWIDTHLARGE = 500;
    final const IMAGEHEIGTHLARGE = 500;

    public function __construct(protected HelperImage $helperImg, protected ProductImgHelper $productImgHelper)
    {
    }

    public function isEnbaled()
    {
        return $this->productImgHelper->isEnabled();
    }

    public function getImageUrl( $product )
    {
        if($product) {
            return $this->helperImg->init($product, 'product_thumbnail_image')->setImageFile($product->getSmallImage())->resize(self::IMAGEWIDTH, self::IMAGEHEIGTH)->getUrl();
        }
        return '';
    }

    public function getImageUrlLarge( $product )
    {
        if($product) {
            return $this->helperImg->init($product, 'product_large_image')->setImageFile($product->getSmallImage())->resize(self::IMAGEWIDTHLARGE, self::IMAGEHEIGTHLARGE)->getUrl();
        }
        return '';
    }

    public function getAllImages( $product )
    {
        if($product) {
            $test = $product->getMediaGalleryImages();
            return $test;
        }
        return '';
    }
}
