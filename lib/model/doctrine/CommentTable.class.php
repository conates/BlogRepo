<?php

/**
 * CommentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CommentTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object CommentTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Comment');
    }

    public function getCommentPending() {

        $pending = Doctrine::getTable('Comment')
                ->createQuery('c')
                ->where('c.state = ?', 'Pendiente')
        ;
        return $pending;
    }

    public function getCommentPublic() {

        $public = Doctrine::getTable('Comment')
                ->createQuery('c')
                ->where('c.state = ?', 'Publicado')
        ;


        return $public;
    }

    public function getCommentDay() {

        $pending = Doctrine::getTable('Comment')
                ->createQuery('c')
                ->where('c.created_at > ?', date('Y-m-d'))
        ;
        return $pending;
    }

    public function getStatisticsPost() {
        die('<pre>' . print_r('hacer el query en un procedimiento almacenado <br>
SELECT v.id AS v__id, v.date AS v__0, p.id AS p__id, p.slug AS p__slug, v.date AS v__0, COUNT(v.id) AS v__1 FROM visit v INNER JOIN post p ON v.post_id = p.id GROUP BY v.date ORDER BY COUNT(v.id)    

', 1) . '</pre>');
        $q = Doctrine_Query::create()
                ->select('v.date as fecha, p.slug,v.id,count(v.id) as cantidad_visita')
                ->from('Visit v')
                ->innerJoin('v.Post p')
                ->groupBy('v.date')
                ->orderBy('count(v.id)')
        ;
//die('<pre>'.print_r($q->getSqlQuery(),1).'</pre>');
        return $q->fetchArray();
    }

    public function getStatisticsComment() {

        die('<pre>' . print_r('hacer el query en un procedimiento almacenado <br>
        SELECT p.id AS p__id, p.date AS p__0, p.slug AS p__slug, p.date AS p__0, COUNT(c.id) AS c__1 FROM post p INNER JOIN comment c ON p.id = c.post_id GROUP BY p.id ORDER BY COUNT(c.id)
       ', 1) . '</pre>');
        $q = Doctrine_Query::create()
                ->select('p.date as fecha, p.slug,count(c.id) as cantidad_comentario')
                ->from('Post p')
                ->innerJoin('p.Comments c')
                ->groupBy('p.id')
                ->orderBy('count(c.id)')
        ;
        //die('<pre>'.print_r($q->getSqlQuery(),1).'</pre>');
        return $q->fetchArray();
    }
    public function getAllPostComment($id_post) {
        return Doctrine_Query::create()
                ->select('c.*')
                ->from('Comment c')
                ->where('state =?', 'Publicado')
                ->andWhere('c.post_id = ?', $id_post)
                ->fetchArray();
    }
}