<?php

namespace Ifgiovanni\LogVMiddlewareAuth\Traits;

trait JwtTrait
{   

    public function is_jwt_valid($jwt) {

        $secret = config('LOG_VIEWER_JWT_SECRET');
        $tokenParts = explode('.', $jwt);
        
        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = $tokenParts[2];
    
        $expiration = json_decode($payload)->exp;
        $is_token_expired = ($expiration - time()) < 0;
    
        $base64_url_header = $this->base64url_encode($header);
        $base64_url_payload = $this->base64url_encode($payload);
        $signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $secret, true);
        $base64_url_signature = $this->base64url_encode($signature);
    
        $is_signature_valid = ($base64_url_signature === $signature_provided);
        
        if ($is_token_expired || !$is_signature_valid) {
            return false;
        } else {
            return true;
        }
    }

    public function generate_jwt($headers, $payload)
    {
        $secret = config('LOG_VIEWER_JWT_SECRET');
        $headers_encoded = $this->base64url_encode(json_encode($headers));
        $payload_encoded = $this->base64url_encode(json_encode($payload));
        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
        $signature_encoded = $this->base64url_encode($signature);

        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";

        return $jwt;
    }

    public function base64url_encode($str)
    {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }
}