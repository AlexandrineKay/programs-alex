<?php
class NewReview extends Controller
{
    public function postNewReview(){
       $review_id = empty($_POST['review_id']) ? null : (int)$_POST['review_id'];
        $review = empty($_POST['review']) ? null : $_POST['review'];
       $nameus = empty($_POST['user_name']) ? null : $_POST['user_name'];
       if (!empty($review) && valid_token($_POST['token'])){
           isset($idfact)
               ? update_message(connection(), $review, $review_id)
               : insert_review(connection(), $review, $nameus);
       }
        header("Location:index.php?action=review");
    }
}