<?php 
    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';
?>

<div class="page-title">
    <div>
        <h1>Reviews</h1>
        <p>View and manage all your reviews</p>
    </div>
</div>

<div class="panel-default">

    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <?= form_label('Select Order *')?>
                <select name="order_id" class="form-control">
                    <?php 
                        $user_id = $_SESSION['user_id'];
                        $sel = "
                            SELECT o.order_id, o.code, s.sub_category
                            FROM `order` o
                            LEFT JOIN sub_category s ON o.sub_id = s.sub_id
                            WHERE o.user_id = '$user_id'
                        ";
                        $run = mysqli_query($con, $sel);

                        while ($row = mysqli_fetch_assoc($run)) {
                            echo "<option value='". $row['order_id'] ."'>". $row['code'] ." - ". $row['sub_category'] ."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group space-top">
                <?= form_label('Rating *')?>
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5" title="5 stars">
                        <i class="fas fa-star"></i>
                    </label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4" title="4 stars">
                        <i class="fas fa-star"></i>
                    </label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3" title="3 stars">
                        <i class="fas fa-star"></i>
                    </label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2" title="2 stars">
                        <i class="fas fa-star"></i>
                    </label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1" title="1 star">
                        <i class="fas fa-star"></i>
                    </label>
                </div>
                <input type="hidden" name="rating_value" id="rating_value" value="0" />
            </div>

            <div class="form-group">
                <?= form_label('Client Reviews *')?>
                <textarea name="review" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Image *</label>
                <input type="file" class="form-control" name="image" />
            </div>

            <div class="form-group">
                <button name="button" type="submit" class="btn btn-primary">Submit Review</button>
            </div>
        </form>

        <?php 
        if (isset($_POST['button'])) {

            if (isset($_POST['rating']) && !empty($_POST['rating'])) {

                // Capture inputs safely
                $order_id      = mysqli_real_escape_string($con, $_POST['order_id']);
                $rating        = mysqli_real_escape_string($con, $_POST['rating']);
                $client_review = mysqli_real_escape_string($con, $_POST['review']);
                $user_id       = $_SESSION['user_id'];

                // Insert query
                $insert = "INSERT INTO order_reviews (order_id, user_id, star, client_review) 
                        VALUES ('$order_id', '$user_id', '$rating', '$client_review')";
                $run = mysqli_query($con, $insert);

                if ($run) {
                    echo "<div class='alert alert-success'>Review submitted successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
                }

            } else {
                echo "<div class='alert alert-warning'>Please select a rating before submitting.</div>";
            }

        }
        ?>

    </div>
</div>

<div class="panel-default">

    <div class="panel-heading">
        <h3>Published Reviews</h3>
    </div>

    <div class="panel-body">

        <table class="table">

            <tr>
                <th>Review ID</th>
                <th>Stars</th>
                <th>Review</th>
                <th>Date</th>
                <th>Hide</th>
            </tr>

            <tr>
                <?php 
                
                    $review = "SELECT * FROM order_reviews WHERE user_id='$user_id'";
                    $run = mysqli_query($con, $review);
                    while($row = mysqli_fetch_assoc($run)) {

                        echo "<tr>
                            <td>". $row['review_id'] ."</td>
                            <td>". $row['star'] ."</td>
                            <td>". $row['client_review'] ."</td>
                            <td>". $row['date'] ."</td>
                            <td>
                                <a href='". base_url() ."hide_review.php?review_id=". $row['review_id'] ."'>Hide</a>
                            </td>
                        </tr>";

                    }
                
                ?>
            </tr>

        </table>

    </div>

</div>

<style>

/* Table Styles */
.table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 0.95rem;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
    border-radius: 10px;
    overflow: hidden;
}

.table th {
    padding: 10px;
    border: 1px solid #000;
}

.table td {
    padding: 14px 18px;
    border-bottom: 1px solid #e1e5eb;
    vertical-align: top;
}

.table tr:nth-child(even) {
    background-color: #f8f9fa;
}

.table tr:hover {
    background-color: #edf2f7;
    transition: background-color 0.2s;
}

/* Stars styling */
.stars {
    color: #f8ce0b;
    font-size: 1.15rem;
    white-space: nowrap;
}

/* Review text styling */
.review-text {
    max-width: 300px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.review-text.expanded {
    white-space: normal;
    text-overflow: clip;
    overflow: visible;
}

/* Button styling */
.btn {
    display: inline-block;
    padding: 8px 14px;
    background: #e53e3e;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.2s;
    border: none;
    cursor: pointer;
}

.btn:hover {
    background: #c53030;
    transform: translateY(-2px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.btn:active {
    transform: translateY(0);
}

/* Date styling */
.date {
    white-space: nowrap;
    color: #718096;
}

/* Action cell styling */
.action-cell {
    white-space: nowrap;
}

/* Toggle text for expanding reviews */
.toggle-text {
    color: #4299e1;
    cursor: pointer;
    font-size: 0.9rem;
    margin-top: 5px;
    display: inline-block;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .table {
        font-size: 0.9rem;
    }
    
    .table th,
    .table td {
        padding: 12px 10px;
    }
    
    .stars {
        font-size: 1rem;
    }
    
    .btn {
        padding: 6px 10px;
        font-size: 0.85rem;
    }
    
    .review-text {
        max-width: 200px;
    }
}

@media (max-width: 480px) {
    .table {
        font-size: 0.85rem;
    }
    
    .table th,
    .table td {
        padding: 10px 8px;
    }
    
    .review-text {
        max-width: 150px;
    }
}
.star-rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    font-size: 1.5em;
}

.space-top {
    margin-bottom: 20px;
}

.star-rating input {
    display: none;
}

.star-rating label {
    color: #ccc;
    cursor: pointer;
    transition: color 0.2s;
    margin-right: 5px;
}

.form-control {
    margin-top: 10px;
}

.star-rating label:hover,
.star-rating label:hover ~ label,
.star-rating input:checked ~ label {
    color: #f8ce0b;
}

.star-rating input:checked + label:hover,
.star-rating input:checked + label:hover ~ label,
.star-rating input:checked ~ label:hover,
.star-rating input:checked ~ label:hover ~ label {
    color: #ffed85;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const starInputs = document.querySelectorAll('.star-rating input');
    const ratingValue = document.getElementById('rating_value');
    
    starInputs.forEach(input => {
        input.addEventListener('change', function() {
            ratingValue.value = this.value;
        });
    });
});
</script>