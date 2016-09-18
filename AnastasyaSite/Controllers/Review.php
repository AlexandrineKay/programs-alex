<?php
class Review extends Controller
{
    public function getReview($params = []){
        $per_page = 5;
        $page = isset($_GET['page']) ? $_GET['page']: 0;
        $review_id = empty($params['review_id']) ? null : (int)$params['review_id'];
        $reviews= load_reviews(connection(), $review_id, $per_page, $page);
        $num_pages= ceil(count_reviews(connection())/$per_page);
        echo template("Templates/templatereview.php", [
            'reviews' => $reviews,
            'review_id' => $review_id,
            'token' => token(),
            'page' => $page,
            'num_pages'=> $num_pages,
        ]);
    }
}