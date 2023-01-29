<?php

namespace App\Library\MrpProfile;


use App\Contracts\Tarifiner\TarifVariant;
use App\Library\Tarifiner\Contracts\BaseTarifVariant;
use App\Models\User;
use MrProperter\Library\PropertyConfigStructure;

class MrpProfileLibary
{


    public static function SplitToOption($optRaw)
    {
        $optRaw = explode("\n", $optRaw);
        $opt = [];
        foreach ($optRaw as $V) {
            $opt[$V] = $V;
        }
        return $opt;
    }

    public static function ExtendUser(PropertyConfigStructure $config)
    {

        $optRawRole = 'Управление проектами
Управление продуктами
Проектирование / разработка
Agile-коуч / Scrum-мастер
Исследование UX
Дизайн
Маркетинг
Операции
Продажи / успех
Поддержка клиентов
Аналитика / наука о данных
ИТ-услуги
HR / Люди
Юридические / финансовые услуги
Преподаватель / студент
Прочее';
        $optRaw = 'Архитектурные и инженерные услуги
Управление активами
Банковское дело
Образовательные услуги: Школы и университеты
Образовательные услуги: Репетиторство
Образовательные услуги: Профессиональное обучение
Услуги графического и веб-дизайна
Оборудование для здравоохранения
Услуги здравоохранения
Страхование
ИТ-консалтинг
Производство
Маркетинг и реклама
Кино и развлечения
Фармацевтика, биотехнологии и науки о жизни
Государственное управление
Издательское дело
Недвижимость
Разработка программного обеспечения: приложения и системы
Разработка программного обеспечения: игры
Разработка программного обеспечения: аутсорсинговые компании
Дистрибьюторы технологий
Технологическое оборудование и аппаратура
Телекоммуникационные услуги
Транспорт
Прочее';

        $config->String("companyName")->SetLabel("Компания")->SetDefault("")
            ->AddTag(['profile']);


        $config->Select("Industry")->SetLabel("Индустрия")->SetDescr("В какой области вы разрабатываете проекты?")->SetDefault("Прочее")
            ->AddTag(['profile.industry'])->SetOptions(self::SplitToOption($optRaw));


        $config->Select("industry_role")->SetLabel("Индустрия")->SetDescr("В какой области вы разрабатываете проекты?")->SetDefault("Прочее")
            ->AddTag(['profile.industry'])->SetOptions(self::SplitToOption($optRawRole));


        $config->Select("language")->SetLabel("Language")->SetDescr("Попробуйте использовать сервис на испанском, французском, немецком или японском языках. Не все локализовано - пока. Сообщите нам, если у вас возникнут какие-либо проблемы или предложения.")
            ->SetDefault("rus")
            ->AddTag(['profile.language'])->SetOptions(['rus' => 'Русский', 'eng' => "English", 'japan' => "日本語"]);


        return $config;
    }

    public static function ExtendUserProjectNotify(PropertyConfigStructure $config)
    {

        $config->Checkbox("notify_is_email")->SetLabel("Отправлять на почту")->SetDefault(true)->AddTag(['profile_notify_type']);

        $config->Checkbox("notify_proj_share_me")->SetLabel("Когда проектом делятся со мной")->SetDefault(true)->AddTag(['profile_notify_if']);
        $config->Checkbox("notify_proj_share_my_team")->SetLabel("Когда проектом делится команда")->SetDefault(true)->AddTag(['profile_notify_if']);
        $config->Checkbox("notify_proj_requests")->SetLabel("Когда кто-то запрашивает доступ к моему проекту")->SetDefault(true)->AddTag(['profile_notify_if']);
        $config->Checkbox("notify_tag_me")->SetLabel("Когда кто-то отмечает меня @user в комментариях")->SetDefault(true)->AddTag(['profile_notify_if']);


        return $config;
    }

}
