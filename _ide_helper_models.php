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
     * @property-read \Konnec\VueEloquentApi\Models\Post|null $post
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Comment apiQuery(\Illuminate\Http\Request $request)
     * @method static \Konnec\VueEloquentApi\database\factories\CommentFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Comment newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Comment newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Comment query()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Comment whereComment($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Comment whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Comment whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Comment wherePostId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Comment whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Comment whereUserId($value)
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
     * @property-read \Konnec\VueEloquentApi\Models\User|null $author
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Konnec\VueEloquentApi\Models\Comment> $comments
     * @property-read int|null $comments_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Konnec\VueEloquentApi\Models\User> $readers
     * @property-read int|null $readers_count
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post apiQuery(\Illuminate\Http\Request $request)
     * @method static \Konnec\VueEloquentApi\database\factories\PostFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post query()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post whereAuthorId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post whereReadersId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\Post whereUpdatedAt($value)
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
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User apiQuery(\Illuminate\Http\Request $request)
     * @method static \Konnec\VueEloquentApi\database\factories\UserFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User query()
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Konnec\VueEloquentApi\Models\User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}
