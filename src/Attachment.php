<?php
namespace alexandervas\slackbotlistener;

class Attachment implements Transferable{

    /**
     * @var string $attach;
     */
    private $attach;

    /**
     * @var array $attachment_options
     */
    private $attachment_options = [];

    public function serialize()
    {
        return  serialize($this->attach);
    }

    /**
     * @param $keyField
     * @param $valueField
     * @return $this
     */

    public function addField($keyField, $valueField){

        $this->attachment_options[$keyField] = $valueField;
        return $this;
    }

    /**
     * @param $name
     * @param $link
     * @param $icon
     * @return $this
     */
    public function setAuthor($name, $link, $icon){

        $this->applyOptions('author_name',$name);
        $this->applyOptions('author_link',$link);
        $this->applyOptions('author_icon',$icon);

        return $this;
    }

    /**
     * @param $image_url
     * @return $this
     */

    public function setImageUrl($image_url){

        $this->applyOptions('image_url',$image_url);
        return $this;

    }

    /**
     * @param $thumb_url
     * @return $this
     */

    public function setThumbUrl($thumb_url){

        $this->applyOptions('thumb_url',$thumb_url);
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return void
     */
    public function applyOptions($key, $value){

        $this->attachment_options[$key] = $value;

    }
}