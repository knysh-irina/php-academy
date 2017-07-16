<?php
namespace ToilonShop\controllers;

use ToilonShop\components\NotFoundException;
use ToilonShop\controllers\BaseController;
use ToilonShop\components\ReviewsDataProvider;
use ToilonShop\components\RecommendedFriendsDataProvider;
use ToilonShop\components\WeatherDataProvider;
use Facebook;
use ToilonShop\models\UsersModel;

class fbController extends BaseController
{
    public function actionFbCallback()
    {

        if (!session_id()) {
            session_start();
        }

        $fb = new Facebook\Facebook([
            'app_id' => '494708397532440', // Replace {app-id} with your app id
            'app_secret' => '7ac56c8c5e16c2625b779b3078e76f6c',
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
// When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
// When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

// Logged in
        echo '<h3>Access Token</h3>';
        var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        echo '<h3>Metadata</h3>';
        var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId('494708397532440'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
// Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }

            echo '<h3>Long-lived</h3>';
            var_dump($accessToken->getValue());
        }

        $token = $_SESSION['fb_access_token'] = (string)$accessToken;
        /*
         * Request on user information
         */
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me?fields=id,name', $token);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();
        $user_fb_id = $user['id'];
        $user_fb_name = $user['name'];


        /*
         * Authorization by FB
         */
        $this->setModel('users', "\\ToilonShop\\models\\UsersModel");
        $model = $this->getModel('users');
        if (!$model->getUserByFbID($user_fb_id)) {
            $password = password_hash($user_fb_name, PASSWORD_DEFAULT);
            $params = "'" . $user_fb_id . "',' " . $user_fb_name . "','" . $password . "'";
            $model->saveUser($params);

            /**
             * Sending message with password to new user
             */


        }


// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');
    }

}