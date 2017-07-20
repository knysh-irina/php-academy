<?php
namespace ToilonShop\controllers;

use Facebook;
use ToilonShop\config\Main;
use ToilonShop\components\AqmpSender;
use ToilonShop\components\AqmpConsumer;

class fbController extends BaseController
{

    /**
     * Sending message with password to new user
     * @param $param array
     */
    function sendAuthEmailToUser($param)
    {
        echo "Send!!!!!!!!!!!!!!!!!!!!!!!!!";
        $message = "Hello, your authorization succeed! Thank you for your
             attention!" . PHP_EOL . "Your name: " . $param['user_name'] . PHP_EOL . "your password: " . $param['user_pass'];
        $sender = new  AqmpSender();
        $consumer = new AqmpConsumer();
        $sender->send($message);
        // $consumer->consume();

    }

    public function actionFbCallback()
    {

        $config = Main::getConfig()['fb'];
        $fb = new Facebook\Facebook($config);

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
        $tokenMetadata->validateAppId($config['app_id']); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
// Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
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
            $response = $fb->get('/me?fields=id,name,email', $token);
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
        $user_fb_email = 'oleyniktsirina@gmail.com';


        /*
         * Authorization by FB
         */
        $this->setModel('users', "\\ToilonShop\\models\\UsersModel");
        $model = $this->getModel('users');

        /*
         * Save new user to DB via facebook
         */
        if (empty($model->getUserByFbID($user_fb_id))) {

            $password = password_hash($user_fb_name, PASSWORD_DEFAULT);
            $params = "'" . $user_fb_id . "',' " . $user_fb_name . "','" . $password . "','" . $user_fb_email . "'";
            $model->saveUser($params);

            $param = [
                "user_name" => $user_fb_name,
                "user_pass" => $password,
                "user_email" => $user_fb_email
            ];

            $this->sendAuthEmailToUser($param);

        } else {
            echo "User already exists";
        }

        $logoutUrl = $helper->getLogoutUrl($token, 'http://localhost/mvc/mvc/item/show?id=1', $separator = '&');
        echo '<a href="' . htmlspecialchars($logoutUrl) . '">Log out from Facebook!</a>';

// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');
    }

}