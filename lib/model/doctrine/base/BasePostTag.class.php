<?php

/**
 * BasePostTag
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $post_id
 * @property integer $tag_id
 * @property Post $Post
 * @property Tag $Tag
 * 
 * @method integer getPostId()  Returns the current record's "post_id" value
 * @method integer getTagId()   Returns the current record's "tag_id" value
 * @method Post    getPost()    Returns the current record's "Post" value
 * @method Tag     getTag()     Returns the current record's "Tag" value
 * @method PostTag setPostId()  Sets the current record's "post_id" value
 * @method PostTag setTagId()   Sets the current record's "tag_id" value
 * @method PostTag setPost()    Sets the current record's "Post" value
 * @method PostTag setTag()     Sets the current record's "Tag" value
 * 
 * @package    Blog
 * @subpackage model
 * @author     Conates
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePostTag extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('post_tag');
        $this->hasColumn('post_id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 8,
             ));
        $this->hasColumn('tag_id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 8,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Post', array(
             'local' => 'post_id',
             'foreign' => 'id'));

        $this->hasOne('Tag', array(
             'local' => 'tag_id',
             'foreign' => 'id'));
    }
}