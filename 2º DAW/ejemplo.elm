module Main exposing (main)

import Browser
import Html exposing (Html, div, text, input, button)
import Html.Events exposing (onClick, onInput)
import Html.Attributes exposing (placeholder)

-- MODELO
type alias Model =
    { name : String }

initialModel : Model
initialModel =
    { name = "" }

-- MENSAJES
type Msg
    = UpdateName String
    | Reset

-- ACTUALIZACIONES
update : Msg -> Model -> Model
update msg model =
    case msg of
        UpdateName newName ->
            { model | name = newName }

        Reset ->
            initialModel

-- VISTA
view : Model -> Html Msg
view model =
    div []
        [ input [ placeholder "Introduce tu nombre", onInput UpdateName ] []
        , div [] [ text ("Hola, " ++ model.name ++ "!") ]
        , button [ onClick Reset ] [ text "Resetear" ]
        ]

-- PROGRAMA PRINCIPAL
main =
    Browser.sandbox { init = initialModel, update = update, view = view }
