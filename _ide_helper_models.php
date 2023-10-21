<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App\Models{
    /**
     * Konnec\VueEloquentApi\Models\Comment
     *
     * @property int $id
     * @property int $post_id
     * @property int $user_id
     * @property string $comment
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Konnec\Examples\Models\Post|null $post
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Comment apiQuery(\Illuminate\Http\Request $request)
     * @method static \Illuminate\Support\Facades\database\factories\CommentFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Comment newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Comment newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Comment query()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Comment whereComment($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Comment whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Comment whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Comment wherePostId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Comment whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Comment whereUserId($value)
     */
    class Comment extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * Konnec\VueEloquentApi\Models\Post
     *
     * @property int $id
     * @property int $author_id
     * @property array|null $readers_id
     * @property string $title
     * @property string $description
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Konnec\Examples\Models\User|null $author
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Konnec\Examples\Models\Comment> $comments
     * @property-read int|null $comments_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Konnec\Examples\Models\User> $readers
     * @property-read int|null $readers_count
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post apiQuery(\Illuminate\Http\Request $request)
     * @method static \Illuminate\Support\Facades\database\factories\PostFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post query()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post whereAuthorId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post whereReadersId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\Post whereUpdatedAt($value)
     */
    class Post extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * Konnec\VueEloquentApi\Models\User
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
     * @property-read int|null $tokens_count
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User apiQuery(\Illuminate\Http\Request $request)
     * @method static \Illuminate\Support\Facades\database\factories\UserFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User query()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\Examples\Models\User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}
