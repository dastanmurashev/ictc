<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SurveyController extends Controller
{
    public function sendSurvey(Request $request)
    {
        $data = $request->all();

        // Формируем текст письма
        $messageText = "Анкетирование о Казахстанско-Германской гимназии в Астане\n\n";
        $messageText .= "1. Как Вы узнали о строительстве Казахстанско-Германской гимназии в Астане? " . ($data['question_1'] ?? 'Не указано') . "\n";
        if (!empty($data['question_1_other'])) {
            $messageText .= "   Другое: " . $data['question_1_other'] . "\n";
        }
        $messageText .= "2. Насколько Вас интересует обучение Вашего ребенка в гимназии по немецким образовательным стандартам? " . ($data['question_2'] ?? 'Не указано') . "\n";
        $messageText .= "3. На каком языке Вам предпочтительно обучение в гимназии? " . ($data['question_3'] ?? 'Не указано') . "\n";
        $messageText .= "4. Насколько для Вас важно углубленное изучение немецкого языка? " . ($data['question_4'] ?? 'Не указано') . "\n";

        $messageText .= "5. Какие дополнительные языки кроме казахского, русского и немецкого были бы интересны Вашему ребенку?  ";
        if (!empty($data['question_5'])) {
            $messageText .= implode(', ', $data['question_5']);
        } else {
            $messageText .= "Не указано";
        }
        if (!empty($data['question_5_other'])) {
            $messageText .= ", Другое: " . $data['question_5_other'];
        }
        $messageText .= "\n";

        $messageText .= "6. Что для Вас важно при выборе частной школы? (выберите до 3-х вариантов) ";
        if (!empty($data['question_6'])) {
            $messageText .= implode(', ', $data['question_6']);
        } else {
            $messageText .= "Не указано";
        }
        if (!empty($data['question_6_other'])) {
            $messageText .= ", Другое: " . $data['question_6_other'];
        }
        $messageText .= "\n";

        $messageText .= "7. Какие внеклассные занятия, кружки и секции Вы считаете приоритетными? ";
        if (!empty($data['question_7'])) {
            $messageText .= implode(', ', $data['question_7']);
        } else {
            $messageText .= "Не указано";
        }
        if (!empty($data['question_7_other'])) {
            $messageText .= ", Другое: " . $data['question_7_other'];
        }
        $messageText .= "\n";

        $messageText .= "8. Ваши основные ожидания от новой гимназии? ";
        if (!empty($data['question_8'])) {
            $messageText .= implode(', ', $data['question_8']);
        } else {
            $messageText .= "Не указано";
        }
        if (!empty($data['question_8_other'])) {
            $messageText .= ", Другое: " . $data['question_8_other'];
        }
        $messageText .= "\n";

        $messageText .= "9. Какой диапазон стоимости обучения в год Вы считаете приемлемым?  " . ($data['question_9'] ?? 'Не указано') . "\n";

        $messageText .= "10. Какие факторы оправдывают для Вас более высокую стоимость обучения? (Можно выбрать несколько вариантов) ";
        if (!empty($data['question_10'])) {
            $messageText .= implode(', ', $data['question_10']);
        } else {
            $messageText .= "Не указано";
        }
        $messageText .= "\n";

        $messageText .= "11. Возраст Вашего ребенка " . ($data['question_11'] ?? 'Не указано') . "\n";

        $messageText .= "12. сли Вам интересна дополнительная информация по обучению, оставьте,  пожалуйста, Ваши данные (ФИО и контактный номер телефона). Ваши данные останутся конфиденциальными и будут использованы только для связи с Вами по вопросам поступления в гимназию " . ($data['question_12'] ?? 'Не указано') . "\n";

        // Отправка письма
        Mail::raw($messageText, function ($message) {
            $message->to('ta@ictc.kz')
                ->subject('Анкетирование о Казахстанско-Германской гимназии в Астане');
        });

        return back()->with('success', 'Анкета отправлена!');
    }
}
