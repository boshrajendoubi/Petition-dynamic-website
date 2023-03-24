
<?php 
require_once 'dbh.php';
$sql5='select * from petitions where decision="refus" order by id ASC';
$result5=mysqli_query($conn,$sql5);
include 'adminheadnav.php';
?>

<style>
    .details{
        width: 1900px;
    }
    
</style>


<div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Liste pétitions</h2>
                        
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Titre de la petition</td>
                                <td>nom du createur</td>
                                <td>catégorie</td>
                                <td>etat</td>
                                <td>action</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i=0;
                            while($row=$result5->fetch_assoc())
                                
                            {
                            ?>
                            <tr>
                                <td><?php
                                 echo $row['titre'];

                                 ?></td>
                                <?php
                                
                                $temp='SELECT * FROM users WHERE id="'.$row['createur'].'"';
                                $res=mysqli_query($conn,$temp);
                                $createur=mysqli_fetch_assoc($res);
                                ?>
                                <td><?php 
                               echo $createur['firstname']." ".$createur['lastname'];
                                ?></td>
                                <td><span class="status inProgress"><?php echo $row['categorie'];?></span></td>
                                <form method="post" action="pending-post.php">
                                <td><?php echo $row['decision'];?>
                                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                </td>
                                <td><input type="submit" name="approuver" class="status delivered" value="Approuver"><input type="submit" name="delete" class="status pending" value="Effacer"></td>
                                </form>
                            </tr>

                            <?php
                            $i=$i+1;
                            if($i>7)
                                {break;}
                        }
                            ?>
                            <!-- status pending/return/inProgress  nestaamelhom fel page mtaa messages-->
                            

                            
                        </tbody>
                    </table>
                </div>
            </div>
