<?php get_header(); ?>

<section class="news-section">
    <div class="news">
        <p class="news-prompt">På gång i huset</p>
        <div class="news-items">
            <?php $news = get_posts(['post_type' => 'news']); ?>
            <?php if (count($news)) : ?>
                <?php foreach ($news as $post) : setup_postdata($post); ?>
                    <?php $postContent = get_the_content($post) ?>
                    <div class="news-card">
                        <div class="news-card-text">
                            <h1 class="news-card-header"><?php the_title(); ?></h1>
                            <?php if (get_field('content')) : ?>
                                <p class="news-card-paragraph"><?php the_field('content'); ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <button>Fler nyheter</button>
    </div>
</section>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <?php the_content(); ?>
        </article>
    <?php endwhile;
else : ?>
    <article>
        <p>Nothing to see.</p>
    </article>
<?php endif; ?>

<?php $events = get_posts(['post_type' => 'events']); ?>

<?php if (count($events)) : ?>
    <section class="events">
        <h2>Evenemang & Utställningar</h2>

        <div class="event-cards">
            <?php foreach ($events as $post) : setup_postdata($post); ?>

                <?php $eventTypes = get_the_terms($post, 'event-type'); ?>

                <div class="event-card">
                    <div class="event-date">
                        <?php if (get_field('date')) : ?>
                            <p><?php the_field('date'); ?></p>
                        <?php endif; ?>
                        <?php if (get_field('time')) : ?>
                            <p><?php the_field('time'); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="event-info">
                        <p>
                            <?php foreach ($eventTypes as $eventType) : ?>
                                <a class="event-type" href="<?php echo get_term_link($eventType) ?>"><?php echo $eventType->name ?></a>
                            <?php endforeach; ?>
                        </p>
                        <h1 class="event-name"><?php the_title(); ?></h1>
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('medium');
                        } ?>
                        <button class="event-read-more-button"><span class="event-read-more-span">Läs mer..</span></button>
                        <button class="ticket-button">Köp Biljett</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>
    <button class="more-news-button">Alla evenemang</button>
    </section>

    <section class="news-letter">
        <div class="news-letter-box">
            <h1>Nyhetsbrev</h1>
            <p>Vill du få information om Gathenhielmska rakt in i din brevlåda? Skriv då in din mailadress här nedan så hörs vi på mailen!</p>
            <form>
                <label for="name">För- och efternamn</label>
                <input type="text" name="name" id="name">
                <label for="email">E-post</label>
                <input type="email" name="email" id="email">
            </form>
            <button>Skicka</button>
        </div>
    </section>

    <?php get_footer();
