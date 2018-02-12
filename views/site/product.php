<div class="container">
    <div class="row">
        <div class="col-lg-12 contant_wrap">
            <div class="navigation">
                <ul>
                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="#">Снаряжение</a></li>
                    <li><span>Рюкзаки</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row content page_prod">

                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                    <div class="img_prod">
                        <img src="/images/prod1.jpg">
                    </div>
                </div>

                <div class="col-lg-5 col-md-8 col-sm-7 col-xs-12">
                    <div class="content_prod">
                        <h1>Рюкзак туристический</h1>
                        <p><span>Артикул:</span> 1H05</p>
                        <p>В наличии</p>
                        <p>В выборе туристического рюкзака необходимо полагаться не только на его внешний вид, но и важные характеристики, такие как его объем, вес, крепления и многие другие. Для разных целей существуют отдельные подгруппы рюкзаков.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-8 col-sm-7 col-sm-offset--5 col-xs-12">
                    <div class="order_prod">w
                        <p class="price_prod">3500 руб</p>
                        <p class="price_old_prod">3700 руб</p>
                        <p>Количество:</p>
                        <form>
                            <input type="text" name="" value="1" id="count" class="input_text">
                            <button class="minus">-</button>
                            <button class="plus">+</button>
                        </form>
                        <a href="#" data-id="<?=$product->id?>" class="add_cart_prod cart"><i class="glyphicon glyphicon-shopping-cart"></i> В корзину</a>
                        <a href="#" class="add_mylist_prod"><i class="glyphicon glyphicon-heart"></i>В список желаний</a>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="h_prod">
                        <h3>Характеристики:</h3>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Объём, л</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>Вес, кг</td>
                                <td>1,2</td>
                            </tr>
                            <tr>
                                <td>Высота, см</td>
                                <td>50</td>
                            </tr>
                        </table>

                    </div>
                    <div class="r_prod">
                        <h3>Отзывы:</h3>
                        <div class="reviews">
                            <div class="reviews_img">
                                <img src="/images/avatar.png">
                            </div>
                            <div class="reviews_contant">
                                <p class="reviews_title">Иван <span>9.06.2017</span></p>
                                <div class="reviews_rating">
                                    <i class="glyphicon glyphicon-star active"></i>
                                    <i class="glyphicon glyphicon-star active"></i>
                                    <i class="glyphicon glyphicon-star active"></i>
                                    <i class="glyphicon glyphicon-star active"></i>
                                    <i class="glyphicon glyphicon-star no_active"></i>
                                </div>
                                <p class="reviews_text">Хороший рюкзак, рекомендую</p>
                            </div>
                        </div>
                        <div class="reviews">
                            <div class="reviews_img">
                                <img src="/images/avatar.png">
                            </div>
                            <div class="reviews_contant">
                                <p class="reviews_title">Иван <span>9.06.2017</span></p>
                                <div class="reviews_rating">
                                    <i class="glyphicon glyphicon-star active"></i>
                                    <i class="glyphicon glyphicon-star active"></i>
                                    <i class="glyphicon glyphicon-star active"></i>
                                    <i class="glyphicon glyphicon-star active"></i>
                                    <i class="glyphicon glyphicon-star no_active"></i>
                                </div>
                                <p class="reviews_text">Хороший рюкзак, рекомендую</p>
                            </div>
                        </div>
                        <div class="reviews_form">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p>Отзыв о товаре:</p>
                            </div>
                            <form action="/" method="post">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" placeholder="Имя">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="email" placeholder="E-mail">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="text" placeholder="Отзыв"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <i class="glyphicon glyphicon-star"></i>
                                    <i class="glyphicon glyphicon-star"></i>
                                    <i class="glyphicon glyphicon-star"></i>
                                    <i class="glyphicon glyphicon-star"></i>
                                    <i class="glyphicon glyphicon-star"></i>
                                </div>
                                <div class="col-lg-12">
                                    <button>Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>